<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
//    Show register form
    public function create(){
        return view('users/register');
    }

    public function store(Request $request){
        $validateValues = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash Password
        $validateValues['password'] = bcrypt($validateValues['password']);
       $user =   User::create($validateValues);
        auth()->login($user);
        return redirect('/')->with('message', 'Your account has been created. your logged in now');
    }

    public function login(Request $request) {
        return view('users/login');
    }
}
