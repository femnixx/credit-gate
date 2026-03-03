<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class HomeController extends Controller
{
    public function index() 
    {
       $tasks = auth()->user()->tasks;

        return Inertia::render('Homepage', [
            'user' => Auth::user(),
            'serverTime' => now()->toTimeString(),
            'tasks' => TaskResource::collection($tasks)
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
