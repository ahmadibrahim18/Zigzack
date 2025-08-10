<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\Playlist_videoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\ContentCreatorController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use closure;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [RegisterController::class, 'login']);
Route::post('/validate-user', [RegisterController::class, 'validateUser']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [RegisterController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);      // Get all users
    Route::get('/users/{id}', [UserController::class, 'show']);  // Get single user
    Route::post('/users', [UserController::class, 'store']);     // Create user
    Route::put('/users/{id}', [UserController::class, 'update']); // Update user
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Delete user
});
Route::apiResource('users', UserController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('videos', VideoController::class);
    Route::get('/videos', [VideoController::class, 'index']); // Get all videos
    Route::get('/videos/{id}', [VideoController::class, 'show']); // Get single video
    Route::put('/videos/{id}', [VideoController::class, 'update']); // Update video
    Route::delete('/videos/{id}', [VideoController::class, 'destroy']); // Delete video

    
});

Route::middleware('auth:sanctum')->group(function () {

    
    Route::post('/playlists', [PlaylistController::class, 'store']);
    Route::get('/playlists', [PlaylistController::class, 'index']);
    Route::get('/playlists/{id}', [PlaylistController::class, 'show']);
    Route::put('/playlists/{id}', [PlaylistController::class, 'update']);
    Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy']);

});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/playlists/{id}/videos', [Playlist_videoController::class, 'store']);
    Route::delete('/playlists/{id}/videos/{videoId}', [Playlist_videoController::class, 'destroy']);
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/favorites', [FavoriteController::class, 'store']);
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/history', [HistoryController::class, 'index']);
    Route::post('/history', [HistoryController::class, 'store']);
    Route::delete('/history/{id}', [HistoryController::class, 'destroy']);
    Route::delete('/history', [HistoryController::class, 'clear']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('content-creators', ContentCreatorController::class);
    Route::apiResource('subscriptions', SubscriptionController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('reviews', ReviewController::class);
});


    // Add more admin routes here
