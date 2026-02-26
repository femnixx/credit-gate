<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() { 
        return Inertia::render('SignIn');
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

    if (Auth::attempt($credentials)) { 
        $request->session()->regenerate();

        return redirect()->intended('/cats');
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records',
    ]);
    }
}
