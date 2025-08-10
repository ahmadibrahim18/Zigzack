<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewCreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // This method should return a list of reviews for content creators
        return Review::where('content_creator_id', $contentCreatorId)->get();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'content_creator_id' => 'required|exists:content_creators,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        return Review::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Review::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'content_creator_id' => 'required|exists:content_creators,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::findOrFail($id);
        $review->update($data);
        return $review;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->noContent();
    }
}
