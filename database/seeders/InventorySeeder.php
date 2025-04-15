<?php

namespace Database\Seeders;

use App\Models\Inventory as ModelsInventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsInventory::insert([
            [
                'id' => '1',
                'productId' => '1',
                'vendorId' => '1',
                'quntity' => '100',
                'status' => 'active'
            ],

            [
                'id' => '2',
                'productId' => '2',
                'vendorId' => '1',
                'quntity' => '120',
                'status' => 'active'
            ],

            [
                'id' => '3',
                'productId' => '3',
                'vendorId' => '1',
                'quntity' => '150',
                'status' => 'active'
            ],

            [
                'id' => '4',
                'productId' => '4',
                'vendorId' => '1',
                'quntity' => '180',
                'status' => 'active'
            ],

            [
                'id' => '5',
                'productId' => '5',
                'vendorId' => '1',
                'quntity' => '100',
                'status' => 'active'
            ],

            [
                'id' => '6',
                'productId' => '6',
                'vendorId' => '1',
                'quntity' => '130',
                'status' => 'active'
            ],

            [
                'id' => '7',
                'productId' => '1',
                'vendorId' => '1',
                'quntity' => '80',
                'status' => 'active'
            ],

            [
                'id' => '8',
                'productId' => '2',
                'vendorId' => '1',
                'quntity' => '140',
                'status' => 'active'
            ],

            [
                'id' => '9',
                'productId' => '3',
                'vendorId' => '1',
                'quntity' => '125',
                'status' => 'active'
            ],

            [
                'id' => '10',
                'productId' => '4',
                'vendorId' => '1',
                'quntity' => '200',
                'status' => 'active'
            ],

            [
                'id' => '11',
                'productId' => '5',
                'vendorId' => '1',
                'quntity' => '135',
                'status' => 'active'
            ]
        ]);
    }
}
