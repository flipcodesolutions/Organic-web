<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =[ [
            'name' => 'Clothing',
            'description' => 'test'
        ],
        [
            'name' => 'Electronics',
            'description' => 'test1'
        ],
        [
            'name' => 'Furniture ',
            'description' => 'test2'
        ]
        ];
        foreach ($categories as $value) {
            Category::create($value);
        }

    }
}
