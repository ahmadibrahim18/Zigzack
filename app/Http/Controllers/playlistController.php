<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;

use App\Http\Controllers\videoController;
use App\Models\Playlist_video;
use App\Http\Controllers\Playlist_videoController;   
use app\Models\Video;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Playlist::all(), 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $playlist = Playlist::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'user_id' => auth()->id(), // logged-in user
        ]);
        return response()->json($playlist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $playlist = Playlist::findOrFail($id);
        return response()->json($playlist, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $playlist = Playlist::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);

        $playlist->update($validated);

        return response()->json($playlist, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->delete();
        return response()->json(null, 204);
    }
}