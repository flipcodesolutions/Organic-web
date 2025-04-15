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
            [
                'id' => '1',
                'userId' => '5',
                'orderDate' => '2025-03-13',
                'total_order_amt' => '882',
                'dis_amt_point' => '10',
                'total_bill_amt' => '872',
                'delivery_slot_id' => '1',
                'order_status' => 'pending',
                'payment_mode' => 'online',
                'addressLine1' => 'Shanti Kunj apartment',
                'addressLine2' => 'Flate no.410',
                'landmark' => 'Near Trimandir',
                'area' => 'Ratanpar',
                'city' => 'Surendranagar',
                'pincode' => '303030',
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
                'order_status' => 'delivered',
                'payment_mode' => 'cash',
                'addressLine1' => 'Shanti Kunj apartment',
                'addressLine2' => 'Flate no.410',
                'landmark' => 'Near Trimandir',
                'area' => 'Ratanpar',
                'city' => 'Surendranagar',
                'pincode' => '303030',
                'status' => 'active'
            ]
        ]);
    }
}
