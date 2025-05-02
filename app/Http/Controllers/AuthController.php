<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the form for user to login.
     */
    public function showLogin()
    {
        return view('frontend.auth.login');
    }

    /**
     * Handle the form submission for User login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successful!');
        }

        return back()->withErrors(['invalid_credentials' => 'Invalid credentials']);
    }

    /**
     * Show the form for registering a new user.
     */
    public function showRegister()
    {
        return view('frontend.auth.register');
    }

    /**
     * Handle the form submission for User Registration.
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required','min:5', 'max:15', 'unique:users', 'alpha_dash'],
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Assign default role (Customer)
        // $user->assignRole('Customer');

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful!');
    }

    /**
     * Handle the form submission for User logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
