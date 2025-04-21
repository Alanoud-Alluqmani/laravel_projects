<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest; 
use App\Http\Requests\RegisterRequest; 
use App\Models\User; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    
    // Register a new user.
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated()); // Create a new user with validated data

        return response()->json([
            'message' => 'User Created Successfully', // Success message
            'data' => $user, // Include the created user data in the response
        ]);
    }

    
     // Log in an existing user.
    public function login(LoginRequest $request)
    {
        $cardinals = $request->validated(); // Retrieve validated login data

        $user = User::where('email', $cardinals['email'])->first(); // Find the user by email

        // Verify user existence and password
        if (!$user || !Hash::check($cardinals['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials' // Error message for invalid login
            ], 401); // Unauthorized response status
        }

        // Create an authentication token for the user
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;

        return response()->json([
            'message' => 'Login Success', // Success message
            'access_token' => $token, // Include the generated token
            'data' => $user, // Include the user data in the response
        ]);
    }

    
     // Log out the authenticated user.
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete(); // Revoke the current user's token

        return response()->json([
            'message' => 'Logged out successfully!' // Success message for logout
        ], 200); // OK response status
    }
}
