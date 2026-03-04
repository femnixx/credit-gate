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
    public function updateTask(Task $task, User $user) 
    {
    return DB::table('tasks')
    ->where('id', $task->id)
    ->where('user_id', $user->id)
    ->update([
        'task_name' => $task->task_name
    ]);
    }

}
