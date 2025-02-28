<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Unit as ModelsUnitSeeder;


class UnitSeeder extends Seeder
{
    public function run(): void
    {
        ModelsUnitSeeder::insert([
            [
                'id' => '1',
                'unit' => '250G',
                'product_id' => '1',
                'price' => '100',
                'detail' => 'carrot...',
                'per'=>'20',
                'sell_price'=>'120',
                
            ],
            [
                'id' => '2',
                'unit' => '1KG',
                'product_id' => '2',
                'price' => '20',
                'detail' => 'palak...',
                'per'=>'10',
                'sell_price'=>'40',
                
            ],
            [
                'id' => '3',
                'unit' => '500G',
                'product_id' => '3',
                'price' => '150',
                'detail' => 'pinepple....',
                'per'=>'30',
                'sell_price'=>'180',
                
            ]
           
        ]);
        
    }
}
