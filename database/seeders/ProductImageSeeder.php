<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Productimage as ModelsProductimage;


class ProductimageSeeder extends Seeder
{
    public function run(): void
    {
        ModelsProductimage::insert([
            [
                'id' => '1',
                'productid' => '1',
                'url' => 'carrot.jpeg',
                'type' => 'photo',
                
            ],
            [
                'id' => '2',
                'productid' => '2',
                'url' => 'mango.jpeg',
                'type' => 'photo',
            ],
            [
                'id' => '3',
                'productid' => '3',
                'url' => 'spinach.jpg',
                'type' => 'photo',
            ],
            [
                'id' => '4',
                'productid' => '4',
                'url' => 'apple.jpeg',
                'type' => 'photo',
            ],
            [
                'id' => '5',
                'productid' => '5',
                'url' => 'cucumber.jpeg',
                'type' => 'photo',
            ],
            [
                'id' => '6',
                'productid' => '6',
                'url' => 'potato.jpg',
                'type' => 'photo',
            ],
            [
                'id' => '7',
                'productid' => '7',
                'url' => 'onion.jfif',
                'type' => 'photo',
            ]
        ]);
        
    }
}
