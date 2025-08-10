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
        //
        // This method should return a list of subscriptions
        return Subscription::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'content_creator_id' => 'required|exists:content_creators,id',
        ]);

        return Subscription::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Subscription::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'content_creator_id' => 'sometimes|exists:content_creators,id',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->update($data);
        return $subscription;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return response()->noContent();
    }
}
