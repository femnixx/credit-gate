<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function create() 
    { 
        return Inertia::render('SignIn');
    }

}
