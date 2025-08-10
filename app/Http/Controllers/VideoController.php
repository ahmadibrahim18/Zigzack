<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\VideoController;
use App\Models\Video;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
        //
    public function index()
    {
        return response()->json(Video::all(), 200);
    }

    // Store new video
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'url' => 'required|string', // or 'file' if uploading
    ]);

    $validated['user_id'] = auth()->id();

    $video = Video::create($validated);

    return response()->json($video, 201);
}

    // Show single video
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return response()->json($video, 200);
    }

    // Update video
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'url' => 'sometimes|url',
        ]);

        $video->update($validated);

        return response()->json($video, 200);
    }

    // Delete video
    public function destroy($id)
    {
        Video::findOrFail($id)->delete();
        return response()->json(['message' => 'Video deleted'], 200);
    }

}


