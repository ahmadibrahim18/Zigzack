<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'plan_name' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
        'status' => 'required|string',
    ]);

    $subscription = Subscription::create($request->all());
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
