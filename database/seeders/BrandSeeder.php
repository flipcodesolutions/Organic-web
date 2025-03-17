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
                'brand_icon' => 'brandImages/Ramdev.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '2',
                'brand_name' => 'Tata', 
                'brand_icon' => 'brandImages/Tata.png', 
                'status' => 'active'
            ],

            [
                'id' => '3',
                'brand_name' => 'Rani Grocery', 
                'brand_icon' => 'brandImages/RaniGrocery.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '4',
                'brand_name' => 'Amul',
                'brand_icon' => 'brandImages/Amul.png', 
                'status' => 'active'
            ],

            [
                'id' => '5',
                'brand_name' => 'Fortune', 
                'brand_icon' => 'brandImages/Fortune.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '6',
                'brand_name' => 'Nestle', 
                'brand_icon' => 'brandImages/Nestle.png', 
                'status' => 'active'
            ],

            [
                'id' => '7',
                'brand_name' => 'Aashirvaad', 
                'brand_icon' => 'brandImages/Aashirvaad.png', 
                'status' => 'active'
            ],

            [
                'id' => '8',
                'brand_name' => 'Patanjali', 
                'brand_icon' => 'brandImages/Patanjali.png', 
                'status' => 'active'
            ],

            [
                'id' => '9',
                'brand_name' => 'Haldiram', 
                'brand_icon' => 'brandImages/Haldiram.png', 
                'status' => 'active'
            ],

            [
                'id' => '10',
                'brand_name' => 'Britannia', 
                'brand_icon' => 'brandImages/Britannia.png', 
                'status' => 'active'
            ],

            [
                'id' => '11',
                'brand_name' => 'MTR', 
                'brand_icon' => 'brandImages/MTR.png', 
                'status' => 'active'
            ],

            [
                'id' => '12',
                'brand_name' => 'Mother Dairy', 
                'brand_icon' => 'brandImages/MotherDairy.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '13',
                'brand_name' => 'Everest', 
                'brand_icon' => 'brandImages/Everest.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '14',
                'brand_name' => 'Dabur', 
                'brand_icon' => 'brandImages/Dabur.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '15',
                'brand_name' => 'India Gate', 
                'brand_icon' => 'brandImages/IndiaGate.jpeg', 
                'status' => 'active'
            ],
            
            [
                'id' => '16',
                'brand_name' => 'Daawat', 
                'brand_icon' => 'brandImages/Daawat.png', 
                'status' => 'active'
            ],

            [
                'id' => '17',
                'brand_name' => 'Badshah', 
                'brand_icon' => 'brandImages/Badshah.png', 
                'status' => 'active'
            ],

            [
                'id' => '18',
                'brand_name' => 'Saffola', 
                'brand_icon' => 'brandImages/Saffola.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '19',
                'brand_name' => 'Sunflower', 
                'brand_icon' => 'brandImages/Sunflower.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '20',
                'brand_name' => 'Sundrop', 
                'brand_icon' => 'brandImages/Sundrop.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '21',
                'brand_name' => 'Dhara', 
                'brand_icon' => 'brandImages/Dhara.jpeg', 
                'status' => 'active'
            ],

            [
                'id' => '22',
                'brand_name' => 'Gowardhan', 
                'brand_icon' => 'brandImages/Gowardhan.jpeg', 
                'status' => 'active'
            ],
        
            [
                'id' => '23',
                'brand_name' => 'Organic India', 
                'brand_icon' => 'brandImages/OrganicIndia.png', 
                'status' => 'active'
            ],
        );
    }
}
