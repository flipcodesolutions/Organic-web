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
                'url' => 'product/carrot.jpg',
                'type' => 'photo',
                
            ],
            [
                'id' => '2',
                'productid' => '2',
                'url' => 'product/palak.jpg',
                'type' => 'photo',
            ],
            [
                'id' => '3',
                'productid' => '3',
                'url' => 'product/pineapple.jpg',
                'type' => 'photo',
                
            ]
           
        ]);
        
    }
}
