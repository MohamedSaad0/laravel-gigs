<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //    Show register form
    public function create()
    {
        return view('users/register');
    }

    public function store(Request $request)
    {
        $validateValues = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash Password
        $validateValues['password'] = bcrypt($validateValues['password']);
        $user =   User::create($validateValues);
        auth()->login($user);
        return redirect('/')->with('message', 'Your account has been created. your logged in now');
    }

    public function login(Request $request)
    {
        return view('users/login');
    }

    public function logout(Request $request)
    {
        // Remove auth info from user session
        auth()->logout();

        // Invalidate user session &  Regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        $formValues = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($formValues)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in successfully');
        }
        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }
}
