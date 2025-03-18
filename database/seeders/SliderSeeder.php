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
            'url' => 'productImages/AshirvaadAata.jpeg',
            'slider_pos' => 'top',
            'is_navigate' => '1',
            'navigatemaster_id' => '1',
            'status' => 'active'
        ],

        [
            'id' => '2',
            'city_id'=> '1',
            'url' => 'categoryImages/ATTA.jpeg',
            'slider_pos' => 'bottom',
            'is_navigate' => '0',
            'navigatemaster_id' => '2',
            'status' => 'active'
        ],

        [
            'id' => '3',
            'city_id'=> '1',
            'url' => '',
            'slider_pos' => 'Middle',
            'is_navigate' => '1',
            'navigatemaster_id' => '3',
            'status' => 'active'
        
        ]);

    }
}
