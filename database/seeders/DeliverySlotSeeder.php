<?php

namespace Database\Seeders;
use App\Models\DeliverySlot as ModelsDeliverySlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsDeliverySlot::insert([
            [
                'id' => '1',
                'startTime' => '9:30',
                'endTime' => '6:30',
                'isAvailable' => 'yes',
            ],
            [
                'id' => '2',
                'startTime' => '9:30',
                'endTime' => '6:30',
                'isAvailable' => 'no',
            ],
            [
                'id' => '3',
                'startTime' => '7:00',
                'endTime' => '3:00',
                'isAvailable' => 'yes',
            ],
            [
                'id' => '4',
                'startTime' => '8:00',
                'endTime' => '5:00',
                'isAvailable' => 'no',
            ],
            [
                'id' => '5',
                'startTime' => '10:00',
                'endTime' => '4:00',
                'isAvailable' => 'yes',
            ],
            [
                'id' => '6',
                'startTime' => '11:00',
                'endTime' => '7:00',
                'isAvailable' => 'no',
            ]
        ]);
        
    }
}
