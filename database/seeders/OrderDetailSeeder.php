<?php

namespace Database\Seeders;
use App\Models\OrderDetail as ModelsOrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       ModelsOrderDetail::insert([
            'id' => '1',
            'orderMasterId' => '1',
            'productId' => '1',
            'qty' => '1',
            'price' => '294',
            'unit' => '1',
            'total' => '294',
            'status' => 'active'
        ],
    
        [
            'id' => '2',
            'orderMasterId' => '1',
            'productId' => '2',
            'qty' => '2',
            'price' => '560',
            'unit' => '2',
            'total' => '1120',
            'status' => 'active'
        ],
    
        [
            'id' => '3',
            'orderMasterId' => '2',
            'productId' => '3',
            'qty' => '2',
            'price' => '143',
            'unit' => '2',
            'total' => '286',
            'status' => 'active'
        ],

        [
            'id' => '4',
            'orderMasterId' => '2',
            'productId' => '4',
            'qty' => '1',
            'price' => '528',
            'unit' => '2',
            'total' => '528',
            'status' => 'active'
        ],

        [
            'id' => '5',
            'orderMasterId' => '2',
            'productId' => '5',
            'qty' => '1',
            'price' => '1255',
            'unit' => '2',
            'total' => '1255',
            'status' => 'active'
        ],

        [
            'id' => '6',
            'orderMasterId' => '3',
            'productId' => '3',
            'qty' => '1',
            'price' => '143',
            'unit' => '2',
            'total' => '143',
            'status' => 'active'
        ],

        [
            'id' => '7',
            'orderMasterId' => '3',
            'productId' => '6',
            'qty' => '1',
            'price' => '540',
            'unit' => '2',
            'total' => '540',
            'status' => 'active'
        ],

        [
            'id' => '8',
            'orderMasterId' => '3',
            'productId' => '9',
            'qty' => '2',
            'price' => '59',
            'unit' => '2',
            'total' => '118',
            'status' => 'active'
        ],

        [
            'id' => '9',
            'orderMasterId' => '3',
            'productId' => '10',
            'qty' => '1',
            'price' => '288',
            'unit' => '2',
            'total' => '288',
            'status' => 'active'
        ],

        [
            'id' => '10',
            'orderMasterId' => '4',
            'productId' => '1',
            'qty' => '1',
            'price' => '294',
            'unit' => '2',
            'total' => '294',
            'status' => 'active'
        ],

        [
            'id' => '11',
            'orderMasterId' => '4',
            'productId' => '2',
            'qty' => '1',
            'price' => '560',
            'unit' => '2',
            'total' => '560',
            'status' => 'active'
        ],

        [
            'id' => '12',
            'orderMasterId' => '4',
            'productId' => '3',
            'qty' => '2',
            'price' => '143',
            'unit' => '2',
            'total' => '286',
            'status' => 'active'
        ],

        [
            'id' => '13',
            'orderMasterId' => '4',
            'productId' => '8',
            'qty' => '1',
            'price' => '580',
            'unit' => '2',
            'total' => '580',
            'status' => 'active'
        ],

        [
            'id' => '14',
            'orderMasterId' => '4',
            'productId' => '9',
            'qty' => '1',
            'price' => '59',
            'unit' => '2',
            'total' => '59',
            'status' => 'active'
        ],

        [
            'id' => '15',
            'orderMasterId' => '4',
            'productId' => '10',
            'qty' => '1',
            'price' => '288',
            'unit' => '2',
            'total' => '288',
            'status' => 'active'
        ]);
    }
}
