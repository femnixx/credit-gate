<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;

Route::get('/sign-up', function () { 
    return Inertia::render('SignUp');
});

Route::post('/sign-up', [RegisterController::class, 'store']);

Route::get('/sign-in', function () {
    return Inertia::render('SignIn');
});

Route::get('/homepage', [HomeController::class, 'index']);

Route::get('/', [WelcomeController::class, 'index']);

Route::post('/sign-in', [SignInController::class, 'signIn']);