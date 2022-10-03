<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => 'Admin',
        ]);
        \App\Models\Admin::factory()->create([
            'name' => 'Software Developer',
            'email' => 'developer@developer.com',
            'role' => 'Developer',
        ]);
        \App\Models\Admin::factory()->create([
            'name' => 'Marketing Manager',
            'email' => 'sales@sales.com',
            'role' => 'Sales',
        ]);
    }
}
