<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use Illuminate\Validation\ValidationException; // Import ValidationException

class AuthController extends Controller
{
    
    // Registering a new user

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
                
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                ],
            ], 201);


        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors(), // To view the validation error messages
            ], 422);
        }
        
    }

    // Login in a user

    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Generate a new token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token,
                'role' => $user->role
            ],
        ]);
    }

    // Log out the user
    
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully',
        ]);
    }


    //Updating user profiles 

    public function updateProfile(Request $request)
    {
        try {
            // Validate the incoming data
            $validated = $request->validate([
                'name' => 'nullable|string|max:255',
                'phone_number' => 'nullable|string|max:15', // Adjust the validation as needed
                'date_of_birth' => 'nullable|date',
            ]);

            // Get the currently authenticated user
            $user = $request->user();

            // Update the user's data
            $user->update([
                'name' => $validated['name'] ?? $user->name, // Keep existing if not provided
                'phone_number' => $validated['phone_number'] ?? $user->phone_number,
                'date_of_birth' => $validated['date_of_birth'] ?? $user->date_of_birth,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully',
                'data' => [
                    'name' => $user->name,
                    'phone_number' => $user->phone_number,
                    'date_of_birth' => $user->date_of_birth,
                ],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }

  
    public function getClients()
    {
        $clients = User::paginate(10); // No need for all()
        return response()->json($clients);
    }




}
