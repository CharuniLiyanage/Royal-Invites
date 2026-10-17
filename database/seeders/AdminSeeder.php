<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Default Admin User
        User::create([
            'name' => 'System Admin',
            'email' => 'admin@vows.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        // Default Regular User
        User::create([
            'name' => 'Sophia Anderson',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'is_admin' => false,
        ]);
    }
}