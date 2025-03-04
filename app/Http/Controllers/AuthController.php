<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;  // Correct import statement
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'role' => 'required|in:contributor,supervisor',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user,
        ], 201);
    }

    public function loginWithEmail(Request $request)
{
    // Validate input
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Attempt login
    if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
        return response()->json([
            'message' => 'Login successful',
            'user' => auth()->user(),
        ]);
    } else {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

public function loginWithUsername(Request $request)
{
    // Validate input
    $validator = Validator::make($request->all(), [
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Attempt login
    if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
        return response()->json([
            'message' => 'Login successful',
            'user' => auth()->user(),
        ]);
    } else {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}


}
