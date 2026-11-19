<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'company_id' => \App\Models\Company::factory(),
        'user_id' => \App\Models\User::factory(),
        'name' => fake()->sentence(3),
        'description' => fake()->paragraph(),
        'is_completed' => fake()->boolean(),
        'start_at' => now(),
        'expired_at' => now()->addDays(3),
    ];
}
}
