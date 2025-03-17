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
        ModelsOrderMaster::insert(
        [
            'id' => '1',
            'userId' => '5',
            'orderDate' => '2025-03-10',
            'total_order_amt' => '1414',
            'dis_amt_point' => '10',
            'total_bill_amt' => '1272.6',
            'delivery_slot_id' => '1',
            'order_status' => 'Processing',
            'shipping_id' => '1',
            'payment_mode' => 'online',
            'status' => 'active'
        ],

        [
            'id' => '2',
            'userId' => '6',
            'orderDate' => '2025-03-12',
            'total_order_amt' => '2069',
            'dis_amt_point' => '15',
            'total_bill_amt' => '1785.65',
            'delivery_slot_id' => '1',
            'order_status' => 'processing',
            'shipping_id' => '1',
            'payment_mode' => 'online',
            'status' => 'active'
        ],

        [
            'id' => '3',
            'userId' => '7',
            'orderDate' => '2025-03-13',
            'total_order_amt' => '1089',
            'dis_amt_point' => '10',
            'total_bill_amt' => '980',
            'delivery_slot_id' => '1',
            'order_status' => 'Processing',
            'shipping_id' => '1',
            'payment_mode' => 'online',
            'status' => 'active'
        ],
     
        [
            'id' => '4',
            'userId' => '8',
            'orderDate' => '2025-03-14',
            'total_order_amt' => '2067',
            'dis_amt_point' => '15',
            'total_bill_amt' => '1756.5',
            'delivery_slot_id' => '3',
            'order_status' => 'Delivered',
            'shipping_id' => '2',
            'payment_mode' => 'cash',
            'status' => 'active'
        ]);
    }
}
