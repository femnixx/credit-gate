<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

        if ($request->user()->credits < 10) {
            return response()->json(['error' => 'Insufficient funds'], 402);
        }
        
        $request->user()->decrement('credits', 10);
        return back();
    }

    public function increment(Request $request)
    {
        $user = $request->user();

        $user->increment('credits',10);
        
        return back();
    }
}
