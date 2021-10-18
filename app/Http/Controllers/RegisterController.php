<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', 'unique:users,username'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // create the user
        $user = User::create($attributes);

        // log the user in
        auth()->login($user);

        // redirect with a flash message
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
