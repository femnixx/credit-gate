<?php

namespace App\Services;

use App\Models\User;
use App\Models\Task;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;      
class TaskService
{
public function createTask(array $data, User $user) 
{ 
    return DB::transaction(function () use ($user, $data) {
        if ($user->credits < 10) { 
            throw ValidationException::withMessages([
                'credits' => ['Insufficient credits']
            ]);
        }
        $user->decrement('credits',10);

        return $user->tasks()->create($data);
    });
   }
    public function update(array $data, Task $task)
    {
        return DB::transaction(function () use ($task, $data) 
        {
            $task->update([
                'task_name' => $data['task_name'],
                'description' => $data['description'],
            ]);
            return $task;
    });
    }
    public function delete(Task $task) { 
        $task->delete();
        return redirect()->back()->with('success', 'successfully delete task');
    }
}