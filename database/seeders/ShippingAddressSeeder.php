<?php

namespace Database\Seeders;
use App\Models\ShippingAddress as ModelsShippingAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsShippingAddress::insert([
            'id' => '1',
            'user_id' => '5',
            'address_line1' => 'Shanti Kunj',
            'address_line2' => 'Ratanpar',
            'pincode' => '363041',
            'landmark_id' => '2',
            'status' => 'active'
        ],
    
        [
            'id' => '2',
            'user_id' => '6',
            'address_line1' => 'Shriji Krupa',
            'address_line2' => 'Dholipol',
            'pincode' => '363030',
            'landmark_id' => '4',
            'status' => 'active'
        ],

        [
            'id' => '3',
            'user_id' => '7',
            'address_line1' => 'ShriHari Krupa',
            'address_line2' => 'Joravarnagar',
            'pincode' => '363041',
            'landmark_id' => '8',
            'status' => 'active'
        ],

        [
            'id' => '4',
            'user_id' => '8',
            'address_line1' => 'Shanti Sadan',
            'address_line2' => 'Udhyognagar',
            'pincode' => '363002',
            'landmark_id' => '7',
            'status' => 'active'
        ],

        [
            'id' => '5',
            'user_id' => '9',
            'address_line1' => 'FlipCode',
            'address_line2' => '-',
            'pincode' => '363001',
            'landmark_id' => '1',
            'status' => 'active'
        ],

        [
            'id' => '6',
            'user_id' => '10',
            'address_line1' => 'Shiv-Computer',
            'address_line2' => 'Jawahar Chowk',
            'pincode' => '363001',
            'landmark_id' => '3',
            'status' => 'active'
        ]);
    }
}
