<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function create() 
    { 
        return Inertia::render('SignIn');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) { 
            $request->session()->regenerate();

            return redirect()->intended('/homepage');
        }

        return back()->withErrors([
            'email' => 'The proivided credentials do not match our records'
        ]);
    }
}
