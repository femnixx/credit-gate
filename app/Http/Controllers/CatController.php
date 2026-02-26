<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Cat;

class CatController extends Controller
{
    public function index() 
    {
        $cats = Cats::all();

        return Inertia::render('CatIndex', [
            'cats' => $cats
        ]);
    }
}
