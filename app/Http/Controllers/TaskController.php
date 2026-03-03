<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Inertia\Inertia;

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
        $taskService->createTask($request->validated(), auth()->user());
        return redirect()->back()->with('message', 'Task successfully created');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }


}
