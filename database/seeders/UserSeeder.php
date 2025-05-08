<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'role_id' => 1, // admin
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '1234567890',
            'password' => Hash::make('password123'),
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'role_id' => 3, // user role
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('##########'),
                'password' => Hash::make('password123'),
            ]);
        }

        
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'role_id' => 2, // user role
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('##########'),
                'password' => Hash::make('password123'),
            ]);
        }
    }
}
