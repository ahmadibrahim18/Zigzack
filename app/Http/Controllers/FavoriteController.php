<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\favorite;
use App\Http\Controllers\Controller\VideoController;
use App\Http\Controllers\Controller\UserController;
use App\Models\User;
use App\Models\Video;
class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'video_id' => 'required|exists:videos,id',
            'favorited_at' => 'nullable|date',
        ]);
        $validated['user_id'] = auth()->id();


        $favorite = auth()->user()->favorites()->create($validated);
        return response()->json($favorite, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $favorite = auth()->user()->favorites()->where('video_id', $id)->firstOrFail();
        return response()->json($favorite);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $favorite = auth()->user()->favorites()->where('video_id', $id)->firstOrFail();
        $favorite->delete();
        return response()->json(null, 204);
    }
}
