<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
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
            $validated = $request->validate(
                [
                    "title" => 'string',
                    'description' => 'string',
                    'discount_percentage' => 'required',
                    'isActive' => 'boolean|required',
                    'service_id' => 'required|array'                  
                    
                ]
                );
            
            $promotion = Promotion::create(
                [
                    'title' => $validated['title'],
                    'description' => $validated['description'],
                    'discount_percentage' => $validated['discount_percentage'],
                    'isActive' => $validated['isActive'],

                ]
                );

            $promotion->services()->attach($validated['service_id']);

            return response()->json([
                'message' => 'Promotion added successfully!',
            ]);

        }
        catch (\Exception $e){
            return response()-> json([
                'error' => $e ->getMessage(),
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
