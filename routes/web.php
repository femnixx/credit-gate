<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/sign-up', function () { 
    return Inertia::render('SignUp');
});