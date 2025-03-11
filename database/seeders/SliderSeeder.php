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
            'id' => '1',
            'city_id'=> '1',
            'url' => 'spinach.jpeg',
            'slider_pos' => 'top',
            'is_navigate' => '1',
            'navigatemaster_id' => '1',
            'status' => 'active'
        ],

        [
            'id' => '2',
            'city_id'=> '1',
            'url' => 'apple.jpeg',
            'slider_pos' => 'bottom',
            'is_navigate' => '0',
            'navigatemaster_id' => '1',
            'status' => 'active'
        ],

        [
            'id' => '3',
            'city_id'=> '1',
            'url' => 'carrot.jpeg',
            'slider_pos' => 'top',
            'is_navigate' => '1',
            'navigatemaster_id' => '1',
            'status' => 'active'
        ],

        [
            'id' => '4',
            'city_id'=> '1',
            'url' => 'cucumber.jpeg',
            'slider_pos' => 'top',
            'is_navigate' => '1',
            'navigatemaster_id' => '1',
            'status' => 'active'
        ],

        [
            'id' => '5',
            'city_id'=> '1',
            'url' => 'mango.jpeg',
            'slider_pos' => 'bottom',
            'is_navigate' => '0',
            'navigatemaster_id' => '2',
            'status' => 'active'
        ]);

    }
}
