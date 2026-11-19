<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tasks' => $this->tasks->map(function ($task) {
                return [
                    'id' => $task->id,
                    'name' => $task->name,
                    'description' => $task->description,
                    'user' => $task->user->name,
                    'is_completed' => (int) $task->is_completed,
                    'start_at' => $task->start_at,
                    'expired_at' => $task->expired_at,
                ];
            }),
        ];
    }
}
