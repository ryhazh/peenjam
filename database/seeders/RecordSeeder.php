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
        $userIds = User::where('role_id', 3)->pluck('id')->toArray();
        $itemIds = Item::pluck('id')->toArray();
        $staffIds = User::where('role_id', 2)->pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            $status = $faker->randomElement(['pending', 'approved', 'rejected']);

            $returnedAt = null;
            if ($status === 'approved') {
                if ($faker->boolean(50)) {
                    $returnedAt = $faker->dateTimeBetween('-10 days', 'now');
                }
            }

            Record::create([
                'user_id' => $faker->randomElement($userIds),
                'item_id' => $faker->randomElement($itemIds),
                'quantity' => $faker->numberBetween(1, 3),
                'borrowed_at' => $faker->dateTimeBetween('-30 days', 'now'),
                'due_date' => $faker->dateTimeBetween('now', '+30 days'),
                'returned_at' => $returnedAt,
                'reason' => $faker->sentence(),
                'is_approved' => $status,
                'actions_by' => $faker->randomElement($staffIds)
            ]);
        }
    }
}
