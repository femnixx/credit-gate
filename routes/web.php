<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\SignOutController;

Route::get('/sign-up', function () { 
    return Inertia::render('SignUp');
});

Route::post('/sign-up', [RegisterController::class, 'store']);

Route::get('/sign-in', [SignInController::class, 'index']);

Route::get('/homepage', [HomeController::class, 'index']);

Route::get('/', [WelcomeController::class, 'index']);

Route::post('/sign-in', [SignInController::class, 'login']);

Route::post('/homepage/deduct', [HomeController::class, 'deduct']);
Route::post('/homepage/increment', [HomeController::class, 'increment']);

Route::post('/sign-out', [SignOutController::class, 'signOut']);