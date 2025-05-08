<?php

namespace Database\Seeders;

use App\Models\Record;
use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecordSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::where('role_id', 2)->pluck('id')->toArray();
        $itemIds = Item::pluck('id')->toArray(); 
        $staffIds = User::where('role_id', 1)->pluck('id')->toArray(); // Get staff user IDs
        
        for ($i = 0; $i < 10; $i++) {
            Record::create([
                'user_id' => $faker->randomElement($userIds),
                'item_id' => $faker->randomElement($itemIds), 
                'quantity' => $faker->numberBetween(1, 3),
                'borrowed_at' => $faker->dateTimeBetween('-30 days', 'now'),
                'due_date' => $faker->dateTimeBetween('now', '+30 days'),
                'returned_at' => $faker->optional(0.3)->dateTimeBetween('-10 days', 'now'),
                'reason' => $faker->sentence(),
                'is_approved' => $faker->randomElement(['pending', 'approved', 'rejected']),
                'actions_by' => $faker->randomElement($staffIds) 
            ]);
        }
    }
}
