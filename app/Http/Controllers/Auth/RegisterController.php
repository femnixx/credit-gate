<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Inertia\Inertia;

class RegisterController extends Controller
{

    public function index() { 
        return Inertia::render("SignUp");
    }

    public function store(RegisterRequest $request, AuthService $authService)
    {
        $authService->register($request->validated());

        return redirect('/sign-in')->with('message', 'Registration successful! Please log in.');
    }
}
