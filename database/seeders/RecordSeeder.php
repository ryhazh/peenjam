<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'user_id' => 3,
                'item_id' => 1,
                'quantity' => 1,
                'borrow_date' => now(),
                'return_date' => now()->addDays(7),
                'status' => 'borrowed'
            ],
            [
                'user_id' => 3,
                'item_id' => 2,
                'quantity' => 2,
                'borrow_date' => now()->subDays(5),
                'return_date' => now()->addDays(2),
                'status' => 'borrowed'
            ]
        ];

        foreach ($records as $record) {
            Record::create($record);
        }
    }
}
