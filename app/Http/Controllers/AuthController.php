<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showSignUpForm()
    {
        $organisations = \App\Models\Organisation::all();
        return view('signUp', compact('organisations'));
    }

    public function register(Request $request)
    {
        // Common validation rules
        $commonRules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:contributor,supervisor'
        ];

        // Add username validation only for contributors
        if ($request->role === 'contributor') {
            $commonRules['username'] = 'required|string|max:255|unique:users,username';
        }

        // Validate common fields
        $validator = Validator::make($request->all(), $commonRules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        try {
            $userData = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'verified' => false,
                'verification_token' => Str::random(60),
                'credibility_score' => 0.00,
            ];

            if ($request->role === 'supervisor') {
                // Additional validation for supervisor
                $request->validate([
                    'organisation_id' => 'required|exists:organisations,id',
                    'front_organization_card' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'back_organization_card' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ]);

                // Handle organization card uploads
                $frontCardPath = $request->file('front_organization_card')->store('organization_cards', 'public');
                $backCardPath = $request->file('back_organization_card')->store('organization_cards', 'public');

                // Add supervisor-specific fields
                $userData = array_merge($userData, [
                    'account_status' => 'under_review',
                    'organisation_id' => $request->organisation_id,
                    'organisation_id_card_recto' => $frontCardPath,
                    'organisation_id_card_verso' => $backCardPath,
                ]);
            } else {
                // Add contributor-specific fields
                $userData = array_merge($userData, [
                    'username' => $request->username,
                    'account_status' => 'active'
                ]);
            }

            // Create the user
            $user = User::create($userData);

            // Assign role
            $role = Role::firstOrCreate(['title' => $request->role]);
            $user->roles()->attach($role->id);

            if ($request->role === 'supervisor') {
                return redirect()->route('signInWithEmail')
                    ->with('success', 'Registration successful! Please wait for admin approval to access your account.');
            } else {
                return redirect()->route('signInWithEmail')
                    ->with('success', 'Registration successful! You can now log in.');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Registration failed: ' . $e->getMessage())
                ->withInput($request->except('password', 'password_confirmation'));
        }
    }

    public function loginWithEmail(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('signInWithEmail')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Find user by email
        $user = User::where('email', $request->email)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            // Check account status for supervisors
            if ($user->role === 'supervisor' && $user->account_status !== 'active') {
                return redirect()->route('signInWithEmail')
                    ->with('error', 'Your account is pending approval. Please wait for admin verification.')
                    ->withInput($request->except('password'));
            }

            // Store user data in session
            session([
                'user_id' => $user->id,
                'user_type' => $user->role,
                'name' => $user->full_name,
                'email' => $user->email
            ]);
            
            // Redirect based on role
            if ($user->role === 'supervisor') {
                return redirect()->route('supervisor.dashboard');
            } else {
                return redirect()->route('contributerHome');
            }
        }

        // If no match found
        return redirect()->route('signInWithEmail')
            ->with('error', 'Invalid email or password.')
            ->withInput($request->except('password'));
    }

    public function loginWithUsername(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('signInWithUsername')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Find user by username (only contributors have usernames)
        $user = User::where('username', $request->username)
                    ->where('role', 'contributor')
                    ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Check if account is active
            if ($user->account_status !== 'active') {
                return redirect()->route('signInWithUsername')
                    ->with('error', 'Your account is not active.')
                    ->withInput($request->except('password'));
            }

            // Store user data in session
            session([
                'user_id' => $user->id,
                'user_type' => 'contributor',
                'name' => $user->full_name,
                'email' => $user->email
            ]);
            
            return redirect()->route('contributerHome')
                ->with('success', 'Welcome back!');
        }

        // If no match found
        return redirect()->route('signInWithUsername')
            ->with('error', 'Invalid username or password.')
            ->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        // Clear all session data
        $request->session()->flush();
        
        // Redirect to home page with success message
        return redirect()->route('overview')
            ->with('success', 'You have been successfully logged out.');
    }
}
