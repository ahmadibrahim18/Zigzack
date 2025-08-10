<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // This method should return a list of payments
        return Payment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed,canceled',
        ]);

        return Payment::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Payment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'amount' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|in:pending,completed,canceled',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($data);
        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->noContent();
    }
}
