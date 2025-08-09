<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller\playlistController;
use App\Http\Controllers\Controller\videoController;
use App\Models\Playlist_video;
use App\Models\video;
use App\Models\Playlist;
class Playlist_videoController extends Controller
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
        $validated = $request->validate([
            'playlist_id' => 'required|exists:playlists,id',
            'video_id' => 'required|exists:videos,id',
        ]);

        $playlistVideo = Playlist_video::create($validated);

        return response()->json($playlistVideo, 201);


        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $playlistVideo = Playlist_video::findOrFail($id);
        $playlistVideo->delete();
        return response()->json(null, 204);
    }
}
