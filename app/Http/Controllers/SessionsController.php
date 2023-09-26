<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');

    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
        }

        throw ValidationValidationException::withMessages([
            'email' => 'credentials not matched'
        ]);
        
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged Out');
    }

}
