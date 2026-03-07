<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Services\TaskService;

class TaskUpdateController extends Controller
{
    public function update(TaskUpdateRequest $request, Task $task, TaskService $service)
    {
        $service->update($request->validated(), $task);
    }
}
