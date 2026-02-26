<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index() 
    {
        return Inertia::render('Homepage', [
            'user' => Auth::user(),
            'serverTime' => now()->toTimeString(),
        ]);
    }
}
