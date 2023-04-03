<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create() //the create function is used to show the register page
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'isTeacher',
            'password' => 'required|min:5|max:255|confirmed',
            'terms' => 'required'
        ]);

        $isTeacher = request()->has('isTeacher') ? request()->boolean('isTeacher') : 0;
        $attributes['isTeacher'] = $isTeacher;

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }
}