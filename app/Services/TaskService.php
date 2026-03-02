<?php

namespace App\Services;

use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TaskService
{
    public function createUser(User $user, array $data): Task 
    {
        return DB::transaction(function () use ($user, $data) { 
            if ($user->credits < 10) { 
                throw new HttpExeception(402, 'Insufficient credit balance!');
            };
            $user->decrement('credits',10);

            return $user->tasks()->create([
                'task_name' => $data['task_name'],
                'status' => $data['statrus'] ?? 'pending',
            ]);
        });
    }

}

