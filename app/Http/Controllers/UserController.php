<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contributor;
use App\Models\CollecteSupervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountActivationMail;

class UserController extends Controller
{
    // Handle user registration
    public function register(Request $request)
{
    $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'role' => 'required|in:contributor,collecte_supervisor',
        // Add validation rules for other attributes here
    ]);

    if ($request->role == 'contributor') {
        // Register as contributor
        $user = Contributor::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phoneNumber' => $request->phoneNumber,
            'username' => $request->username,
        ]);
    } else {
        // Register as collecte supervisor
        $user = CollecteSupervisor::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'CNI' => $request->CNI,
            'organisation' => $request->organisation,
            'region' => $request->region,
        ]);
    }

    return redirect()->route('login')->with('status', 'Registration successful! Please wait for approval if applicable.');
}


    // Handle login if necessary (Laravel already provides this by default)
    public function login(Request $request)
    {
        // Login logic here if needed
    }
    // app/Http/Controllers/UserController.php

public function showRegistrationForm()
{
    return view('layouts\register');
}

}
