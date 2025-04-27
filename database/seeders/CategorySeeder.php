<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Books',
            'Sports Equipment',
            'Laboratory Equipment',
            'Musical Instruments'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
