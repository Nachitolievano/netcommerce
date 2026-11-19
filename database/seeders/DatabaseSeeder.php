<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run(): void
{
    $user = \App\Models\User::factory()->create(['name' => 'Akira']);
    $company = \App\Models\Company::factory()->create(['name' => 'Netcommerce']);

    \App\Models\Task::factory()->create([
        'company_id' => $company->id,
        'user_id' => $user->id,
        'name' => 'task 1',
        'description' => 'task content',
        'is_completed' => 0,
        'start_at' => '2023-08-04 00:00:00',
        'expired_at' => '2023-08-07 00:00:00',
    ]);

    \App\Models\Task::factory()->create([
        'company_id' => $company->id,
        'user_id' => $user->id,
        'name' => 'task 2',
        'description' => 'task content',
        'is_completed' => 1,
        'start_at' => '2023-08-04 00:00:00',
        'expired_at' => null,
    ]);

    \App\Models\Company::factory(2)->create(['name' => 'Netcommerce']);
}
}
