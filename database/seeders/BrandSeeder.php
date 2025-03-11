<?php

namespace Database\Seeders;
use App\Models\Brand as ModelsBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsBrand::insert(
            [
                'id' => '1',
                'brand_name' => 'Ramdev', 
                'brand_icon' => 'ramdev.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '2',
                'brand_name' => 'Tata', 
                'brand_icon' => 'tata.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '3',
                'brand_name' => 'Rani Grocery', 
                'brand_icon' => 'rani grocery.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '4',
                'brand_name' => 'Amul',
                'brand_icon' => 'amul.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '5',
                'brand_name' => 'Fortune', 
                'brand_icon' => 'fortune.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '6',
                'brand_name' => 'Nestle', 
                'brand_icon' => 'nestle.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '7',
                'brand_name' => 'Aashirvaad', 
                'brand_icon' => 'aashirvaad.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '8',
                'brand_name' => 'Patanjali', 
                'brand_icon' => 'patanjali.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '9',
                'brand_name' => 'Haldiram', 
                'brand_icon' => 'haldiram.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '10',
                'brand_name' => 'Britannia', 
                'brand_icon' => 'britannia.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '11',
                'brand_name' => 'MTR', 
                'brand_icon' => 'mtr.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '12',
                'brand_name' => 'Mother Dairy', 
                'brand_icon' => 'mother dairy.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '13',
                'brand_name' => 'Everest', 
                'brand_icon' => 'everest.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '14',
                'brand_name' => 'Dabur', 
                'brand_icon' => 'dabur.jpeg', 
                'status' => 'active'
            ],
            
            [
                'id' => '15',
                'brand_name' => 'Zydus', 
                'brand_icon' => 'zydus.jpeg', 
                'status' => 'active'
        ]);
    }
}
