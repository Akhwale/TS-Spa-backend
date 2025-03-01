<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try{

            $validated = $request->validate([
                'appointment_id' => 'required',
                'amount' => 'required',
                'payment_date' => 'required'
            ]);

            $payment = Payment::create([
                'appointment_id' => $validated['appointment_id'],
                'amount' => $validated['amout'],
                'payment_date' => $validated['payment_date']
            ]);


            return response()->json([
                'message' => 'Payment added successfully',
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ],500);
        }
       


    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
