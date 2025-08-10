<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use App\Http\payments;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    return response()->json(Subscription::all());
}

public function store(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'content_creator_id' => 'required|exists:content_creators,id',
        'plan' => 'required|string',
        'price' => 'required|numeric',
        'starts_at' => 'nullable|date',
        'ends_at' => 'nullable|date',
    ]);

    $subscription = Subscription::create([
        'user_id' => $validated['user_id'],
        'content_creator_id' => $validated['content_creator_id'],
        'plan' => $validated['plan'],  // Make sure this is here!
        'price' => $validated['price'],
        'starts_at' => $validated['starts_at'] ?? null,
        'ends_at' => $validated['ends_at'] ?? null,
    ]);

    return response()->json($subscription, 201);
}



public function show($id)
{
    $subscription = Subscription::find($id);
    if (!$subscription) {
        return response()->json(['message' => 'Subscription not found'], 404);
    }
    return response()->json($subscription);
}

public function update(Request $request, $id)
{
    $subscription = Subscription::find($id);
    if (!$subscription) {
        return response()->json(['message' => 'Subscription not found'], 404);
    }
    $subscription->update($request->all());
    return response()->json($subscription);
}

public function destroy($id)
{
    $subscription = Subscription::find($id);
    if (!$subscription) {
        return response()->json(['message' => 'Subscription not found'], 404);
    }
    $subscription->delete();
    return response()->json(['message' => 'Subscription deleted']);
}

}
