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
            ],
            [
                'name' => 'Scientific Calculator',
                'image' => 'calculator.jpg',
                'category_id' => 1,
                'description' => 'Advanced scientific calculator for mathematics',
                'quantity' => 25
            ],
            [
                'name' => 'Chemistry Lab Kit',
                'image' => 'lab-kit.jpg',
                'category_id' => 2,
                'description' => 'Basic chemistry laboratory equipment set',
                'quantity' => 8
            ],
            [
                'name' => 'Projector',
                'image' => 'projector.jpg',
                'category_id' => 1,
                'description' => 'HD projector for presentations',
                'quantity' => 5
            ],
            [
                'name' => 'Volleyball',
                'image' => 'volleyball.jpg',
                'category_id' => 3,
                'description' => 'Competition grade volleyball',
                'quantity' => 12
            ],
            [
                'name' => 'Biology Reference Book',
                'image' => 'biology-book.jpg',
                'category_id' => 2,
                'description' => 'Comprehensive biology reference guide',
                'quantity' => 15
            ]
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
