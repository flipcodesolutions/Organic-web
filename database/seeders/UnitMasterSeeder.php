<?php

namespace Database\Seeders;
use App\Models\UnitMaster as ModelsUnitMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUnitMaster::insert([
            [
                'unit' => '250G',
                'status' => 'active',
            ],
            [
                'unit' => '500G',
                'status' => 'active',
            ],
            [
                'unit' => '1KG',
                'status' => 'deactive',
            ],
            [
                'unit' => '150G',
                'status' => 'active',
            ],
            [
                'unit' => '2KG',
                'status' => 'active',
            ],
            [
                'unit' => '50G',
                'status' => 'deactive',
            ],
            [
                'unit' => '75G',
                'status' => 'active',
            ],
            [
                'unit' => '300G',
                'status' => 'deactive',
            ]
        ]);
        
    }
}
