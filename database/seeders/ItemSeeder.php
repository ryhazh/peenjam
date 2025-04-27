<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Laptop',
                'image' => 'laptop.jpg',
                'category_id' => 1,
                'description' => 'High-performance laptop for general use',
                'quantity' => 10
            ],
            [
                'name' => 'Physics Textbook',
                'image' => 'physics-book.jpg',
                'category_id' => 2,
                'description' => 'University level physics textbook',
                'quantity' => 20
            ],
            [
                'name' => 'Basketball',
                'image' => 'basketball.jpg',
                'category_id' => 3,
                'description' => 'Official size basketball',
                'quantity' => 15
            ]
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
