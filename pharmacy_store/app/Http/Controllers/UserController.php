<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    
     // Display a listing of all users. 
    public function index()
    {
        $users = User::all(); // Retrieve all users from the database
        return $users; // Return the list of users as a response
    }

    
     //Display a specific user.
    public function show(User $user)
    {
        return $user; // Return the specific user as a response
    }

  // Update the specified user in storage.
  public function update(UpdateUserRequest $request, User $user)
  {
      // Validate and retrieve the data
      $validatedData = $request->validated();

      // Update the user with validated data
      $user->update($validatedData);

      // Return a success response
      return response()->json([
          'message' => 'User updated successfully!',
          'data' => $user, // Include the updated user data
      ]);
  }
    
     //Remove a specific user from the database.
    public function destroy(User $user)
    {
        $user->delete(); // Delete the user from the database

        return response()->json([ // Return a JSON response indicating success
            'message' => 'User Deleted Successfully'
        ]);
    }
}