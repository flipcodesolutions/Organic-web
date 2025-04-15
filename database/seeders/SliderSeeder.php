<?php

namespace Database\Seeders;

use App\Models\Slider as ModelsSlider;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsSlider::insert([
            [
                'id' => '1',
                'city_id' => '1',
                'url' => 'vegetable.jpg',
                'slider_pos' => 'top',
                'is_navigate' => '1',
                'navigatemaster_id' => '1',
                'status' => 'active'
            ],

            [
                'id' => '2',
                'city_id' => '1',
                'url' => 'vegitable2.jpg',
                'slider_pos' => 'middle',
                'is_navigate' => '1',
                'navigatemaster_id' => '2',
                'status' => 'active'
            ],

            [
                'id' => '3',
                'city_id' => '1',
                'url' => 'vegetable3.jpg',
                'slider_pos' => 'bottom',
                'is_navigate' => '1',
                'navigatemaster_id' => '3',
                'status' => 'active'

            ]
        ]);
    }
}
