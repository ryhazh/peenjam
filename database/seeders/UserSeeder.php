<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'role_id' => 1, // admin
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '1234567890',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'role_id' => 2, // staff
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'phone' => '0987654321',
            'password' => Hash::make('password123'),
        ]);

        // Create some regular users
        User::create([
            'role_id' => 3, // user
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'phone' => '1122334455',
            'password' => Hash::make('password123'),
        ]);
    }
}
