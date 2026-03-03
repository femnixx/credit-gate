<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService 
{ 
    public function register(array $data): User 
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'credits' => 100,
        ]);
    }   
    public function login(array $credentials): bool
    {
        if (!Auth::attempt($credentials)) { 
            throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records'],
            ]);
        }
        request()->session()->regenerate();
        return true;
    }
}