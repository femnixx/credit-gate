<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class LoginController extends Controller
{
    public function index() { 
        return Inertia::render('SignIn');
    }

    public function store(Request $request) { 
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) { 
            return redirect()->intended('/homepage');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
