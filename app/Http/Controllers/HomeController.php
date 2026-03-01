<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;

class HomeController extends Controller
{
    public function index() 
    {
        return Inertia::render('Homepage', [
            'user' => Auth::user(),
            'serverTime' => now()->toTimeString(),
        ]);
    }

    public function deduct(Request $request) 
    {
        $user = $request->user();

        if ($user->credits >= 10 ) { 
            $user->decrement('credits', 10);
        }
        return back();
    }
}
