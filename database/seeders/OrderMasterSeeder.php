<?php

namespace Database\Seeders;
use App\Models\OrderMaster as ModelsOrderMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsOrderMaster::insert([
            'id' => '1',
            'userId' => '5',
            'orderDate' => '2025-03-13',
            'total_order_amt' => '882',
            'dis_amt_point' => '10',
            'total_bill_amt' => '872',
            'delivery_slot_id' => '1',
            'order_status' => 'On The Way',
            'shipping_id' => '1',
            'payment_mode' => 'online',
            'status' => 'active'
        ],
    
        [
            'id' => '2',
            'userId' => '5',
            'orderDate' => '2025-03-13',
            'total_order_amt' => '1120',
            'dis_amt_point' => '20',
            'total_bill_amt' => '1100',
            'delivery_slot_id' => '3',
            'order_status' => 'Delivered',
            'shipping_id' => '2',
            'payment_mode' => 'cash',
            'status' => 'active'
        
        ]);
    }
}
