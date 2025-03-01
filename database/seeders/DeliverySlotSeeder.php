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
                'startTime' => '9:30',
                'endTime' => '6:30',
                'isAvailable' => 'Available',
            ],
            [
                'startTime' => '9:30',
                'endTime' => '6:30',
                'isAvailable' => 'NotAvailable',
            ],
            [
                'startTime' => '7:00',
                'endTime' => '3:00',
                'isAvailable' => 'Available',
            ],
            [
                'startTime' => '8:00',
                'endTime' => '5:00',
                'isAvailable' => 'NotAvailable',
            ],
            [
                'startTime' => '10:00',
                'endTime' => '4:00',
                'isAvailable' => 'Available',
            ],
            [
                'startTime' => '11:00',
                'endTime' => '7:00',
                'isAvailable' => 'NotAvailable',
            ]
        ]);
        
    }
}
