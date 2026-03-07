<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\PreventBackHistory;

Route::get('/sign-up', function () { 
    return Inertia::render('SignUp');
});

Route::post('/sign-up', [RegisterController::class, 'store']);

Route::get('/sign-in', [SignInController::class, 'index']);


Route::get('/', [WelcomeController::class, 'index'])->name('login');

Route::post('/sign-in', [SignInController::class, 'login']);

Route::middleware([ 'auth', 'prevent-back' ])->group(function () {
    Route::get('/create-tasks', [TaskController::class, 'index']);

    Route::post('/create-tasks/post',[TaskController::class, 'store']);

    Route::put('/tasks/{task}/update', [TaskController::class, 'update']);
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
    Route::post('/homepage/deduct', [HomeController::class, 'deduct']);
    Route::post('/homepage/increment', [HomeController::class, 'increment']);

    Route::post('/sign-out', [SignOutController::class, 'destroy']);
    Route::get('/homepage', [HomeController::class, 'index']);
});

