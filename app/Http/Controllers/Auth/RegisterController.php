<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request, AuthService $authService)
    {
        $authService->register($request->validated());
    }
}
