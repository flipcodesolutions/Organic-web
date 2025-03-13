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
            'qty' => '3',
            'price' => '294',
            'unit' => '1',
            'total' => '882',
            'status' => 'active'
        ],
    
        [
            'id' => '2',
            'orderMasterId' => '2',
            'productId' => '2',
            'qty' => '2',
            'price' => '560',
            'unit' => '2',
            'total' => '1120',
            'status' => 'active'
        
        ]);
    }
}
