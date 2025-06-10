<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Record;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::where('role_id', 3)->pluck('id')->toArray();
        $staffIds = User::where('role_id', 2)->pluck('id')->toArray();

        if (empty($userIds) || empty($staffIds)) {
            $this->command->warn('Not enough users or staff to seed records. Please seed users first.');
            return;
        }

        $availableItems = Item::where('quantity', '>', 0)->get();

        if ($availableItems->isEmpty()) {
            $this->command->warn('No items available with quantity > 0 to seed records. Please seed items first and ensure they have stock.');
            return;
        }

        for ($i = 0; $i < 30; $i++) {
            if ($availableItems->isEmpty()) {
                $this->command->info('All items exhausted during seeding. Stopping record creation.');
                break;
            }

            $item = $availableItems->random();

            $borrowQuantity = $faker->numberBetween(1, 3);
            $actualBorrowQuantity = min($item->quantity, $borrowQuantity);

            if ($actualBorrowQuantity <= 0) {
                if ($item->quantity <= 0) {
                    $availableItems = $availableItems->reject(fn($availItem) => $availItem->id === $item->id);
                }
                continue;
            }

            $status = $faker->randomElement(['Pending', 'Approved', 'Rejected']);
            $borrowedAt = $faker->dateTimeBetween('-90 days', 'now');
            $dueDate = Carbon::parse($borrowedAt)->addDays($faker->numberBetween(1, 45));
            $returnedAt = null;

            if ($status === 'Approved') {
                if ($faker->boolean(50)) {
                    $returnedAt = $faker->dateTimeBetween($borrowedAt, 'now');
                }
            }

            Record::create([
                'user_id' => $faker->randomElement($userIds),
                'item_id' => $item->id,
                'quantity' => $actualBorrowQuantity,
                'borrowed_at' => $borrowedAt,
                'due_date' => $dueDate,
                'returned_at' => $returnedAt,
                'reason' => $faker->sentence(),
                'is_approved' => $status,
                'actions_by' => $faker->randomElement($staffIds),
                'created_at' => $borrowedAt,
                'updated_at' => $returnedAt ?? now(),
            ]);

            if (is_null($returnedAt)) {
                $item->quantity -= $actualBorrowQuantity;
                $item->save();

                if ($item->quantity <= 0) {
                    $availableItems = $availableItems->reject(fn($availItem) => $availItem->id === $item->id);
                }
            }
        }
    }
}
