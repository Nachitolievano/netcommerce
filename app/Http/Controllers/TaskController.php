<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskCreatedResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create([
            'company_id' => $request->company_id,
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'is_completed' => false,
            'start_at' => now(),
        ]);

        $task->load(['user', 'company']);

        return response()->json(new TaskCreatedResource($task), 201);
    }
}