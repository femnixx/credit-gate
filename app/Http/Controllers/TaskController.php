<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Inertia\Inertia;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render("Tasks");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request,TaskService $taskService)
    {
        $data = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'string|nullable'
        ]);

        $taskService->createTask($data, $request->user());

        return redirect()->back();
    }

}
