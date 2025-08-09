<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\favorite;
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
            'video_id' => 'required|exists:videos,id',
        ]);
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
