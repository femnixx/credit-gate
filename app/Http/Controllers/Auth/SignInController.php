<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\AuthService;

class SignInController extends Controller
{
    public function index() 
    { 
        return Inertia::render('SignIn');
    }

    public function login(Request $request, AuthService $authService)
    {
        $authService->login($request->validated());
        return redirect()->intended(('/homepage'));
    }

}
