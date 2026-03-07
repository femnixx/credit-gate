<?php

namespace App;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;      

class UpdateTaskService
{
    /**
     * Create a new class instance.
     */
    public function update(Task $task, array $data)
    {
        $result = DB::transaction(function () use ($task, $data)
        {
            $task->update([
                'task_name' => $data['task_name'],
                'description' => $data['description']
            ]);
            return $task;
        });

        return $result;
    }
}
