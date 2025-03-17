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
                'unit' => '1',
                'product_id' => '1',
                'price' => '294',
                'detail' => '1KG',
                'per'=>'20',
                'sell_price'=>'260',
                
            ],
            [
                'id' => '2',
                'unit' => '2',
                'product_id' => '2',
                'price' => '560',
                'detail' => '5kg',
                'per'=>'10',
                'sell_price'=>'495',  
            ],
            [
                'id' => '3',
                'unit' => '3',
                'product_id' => '3',
                'price' => '143',
                'detail' => '1L',
                'per'=>'10',
                'sell_price'=>'120',
            ],

            [
                'id' => '4',
                'unit' => '4',
                'product_id' => '4',
                'price' => '528',
                'detail' => '1L',
                'per'=>'10',
                'sell_price'=>'500',
            ],

            [
                'id' => '5',
                'unit' => '5',
                'product_id' => '5',
                'price' => '1255',
                'detail' => '5KG',
                'per'=>'10',
                'sell_price'=>'955',
            ],

            [
                'id' => '6',
                'unit' => '6',
                'product_id' =>'6',
                'price' => '540',
                'detail' => '1L',
                'per'=>'10',
                'sell_price'=>'485',
            ],

            [
                'id' => '7',
                'unit' => '7',
                'product_id' => '7',
                'price' => '210',
                'detail' => '1L',
                'per'=>'10',
                'sell_price'=>'195',
            ],

            [
                'id' => '8',
                'unit' => '8',
                'product_id' => '8',
                'price' => '580',
                'detail' => '1L',
                'per'=>'10',
                'sell_price'=>'549',
            ]
           
        ]);
        
    }
}
