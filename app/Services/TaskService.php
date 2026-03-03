<?php

namespace App\Services;

use App\Models\User;
use App\Models\Task;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;      
use Symfony\Component\HttpKernel\Exception\HttpException;

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

        return $user->tasks()->create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    });
   }

}

