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
        ModelsDeliverySlot::create([
            'startTime'=>'9:30',
            'endTime'=>'6:30',
            'isAvailable'=>'Available',
       ]);

       ModelsDeliverySlot::create([
        'startTime'=>'9:30',
        'endTime'=>'6:30',
        'isAvailable'=>'NotAvailable',
   ]);
    }
}
