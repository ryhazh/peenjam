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
                'image' => 'items/laptop.jpg',
                'category_id' => 1,
                'description' => 'High-performance laptop for general use',
                'quantity' => 10
            ],
            [
                'name' => 'Keyboard',
                'image' => 'items/keyboard.jpeg',
                'category_id' => 2,
                'description' => 'Logitech MX Keys Mini Wireless Keyboard',
                'quantity' => 20
            ],
            [
                'name' => 'Basketball',
                'image' => 'items/basketball.png',
                'category_id' => 3,
                'description' => 'Official size basketball',
                'quantity' => 15
            ],
            [
                'name' => 'Scientific Calculator',
                'image' => 'items/calculator.jpg',
                'category_id' => 1,
                'description' => 'Advanced scientific calculator for mathematics',
                'quantity' => 25
            ],
            [
                'name' => 'Chemistry Lab Kit',
                'image' => 'items/lab-kit.jpg',
                'category_id' => 2,
                'description' => 'Basic chemistry laboratory equipment set',
                'quantity' => 8
            ],
            [
                'name' => 'Projector',
                'image' => 'items/projector.png',
                'category_id' => 1,
                'description' => 'HD projector for presentations',
                'quantity' => 5
            ],
            [
                'name' => 'Volleyball',
                'image' => 'items/volleyball.jpg',
                'category_id' => 3,
                'description' => 'Competition grade volleyball',
                'quantity' => 12
            ],
            [
                'name' => 'Headset',
                'image' => 'items/headset.jpg',
                'category_id' => 2,
                'description' => 'Logitech G Pro X Gaming Headset',
                'quantity' => 15
            ]
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
