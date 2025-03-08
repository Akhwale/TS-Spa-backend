<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Authenticated user route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Updating user profiles
Route::middleware('auth:sanctum')->put('/user', [AuthController::class, 'updateProfile']);


// Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Fetching clients (authenticated users only)
Route::get('/clients', [AuthController::class, 'getClients']);