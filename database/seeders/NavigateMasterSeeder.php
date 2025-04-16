<?php

namespace Database\Seeders;

use App\Models\NavigateMaster as ModelsNavigateMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigateMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsNavigateMaster::insert([
            [
                'id' => '1',
                'screenname' => 'product_screen/product/1',
                'status' => 'active',
            ],

            [
                'id' => '2',
                'screenname' => 'product_screen/category/1',
                'status' => 'active',
            ],

            [
                'id' => '3',
                'screenname' => 'product_screen/product/2',
                'status' => 'active',
            ]
        ]);
    }
}
