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
    return response()->json(Review::all());
}

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'content_id' => 'required|integer',  // id of content being reviewed (video, playlist, etc.)
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string',
    ]);

    $review = Review::create($request->all());
    return response()->json($review, 201);
}

public function show($id)
{
    $review = Review::find($id);
    if (!$review) {
        return response()->json(['message' => 'Review not found'], 404);
    }
    return response()->json($review);
}

public function update(Request $request, $id)
{
    $review = Review::find($id);
    if (!$review) {
        return response()->json(['message' => 'Review not found'], 404);
    }
    $review->update($request->all());
    return response()->json($review);
}

public function destroy($id)
{
    $review = Review::find($id);
    if (!$review) {
        return response()->json(['message' => 'Review not found'], 404);
    }
    $review->delete();
    return response()->json(['message' => 'Review deleted']);
}

}
