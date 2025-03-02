<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getServicesByCategory()
    {
        $categories = Category::with('services')->get();

        return response()->json($categories);
    }



    public function getServices()
    {
        $services = Service::all();

        return response()->json($services);
    }
    

    public function displayServices()
    {
        $services = Service::paginate(12);

        return response()->json($services);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'duration_in_mins' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'isActive' => 'required|boolean',
        ]);

        $service = Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'duration_in_mins' => $validated['duration_in_mins'],
            'category_id' => $validated['category_id'],
            'isActive' => $validated['isActive'],
        ]);

        return response()->json([
            'message' => 'Service added successfully!',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
        ], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
