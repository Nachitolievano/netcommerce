<?php

namespace App\Rules;

use App\Models\Task;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxPendingTasksRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pendingTasksCount = Task::where('user_id', $value)
            ->where('is_completed', false)
            ->count();

        if ($pendingTasksCount >= 5) {
            // De aquí toma Laravel el texto para "message" y "errors.user_id"
            $fail('El usuario ya alcanzó el límite máximo de 5 tareas pendientes.');
        }
    }
}
