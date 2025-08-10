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
    return response()->json(Payment::all());
}

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'amount' => 'required|numeric',
        'payment_method' => 'required|string',
        'status' => 'required|string',
    ]);

    $payment = Payment::create($request->all());
    return response()->json($payment, 201);
}

public function show($id)
{
    $payment = Payment::find($id);
    if (!$payment) {
        return response()->json(['message' => 'Payment not found'], 404);
    }
    return response()->json($payment);
}

public function update(Request $request, $id)
{
    $payment = Payment::find($id);
    if (!$payment) {
        return response()->json(['message' => 'Payment not found'], 404);
    }
    $payment->update($request->all());
    return response()->json($payment);
}

public function destroy($id)
{
    $payment = Payment::find($id);
    if (!$payment) {
        return response()->json(['message' => 'Payment not found'], 404);
    }
    $payment->delete();
    return response()->json(['message' => 'Payment deleted']);
}

}
