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
                'id' => '1',
                'unit' => '25G',
                'status' => 'active',
            ],
            [
                'id' => '2',
                'unit' => '50G',
                'status' => 'active',
            ],
            [
                'id' => '3',
                'unit' => '75G',
                'status' => 'deactive',
            ],
            [
                'id' => '4',
                'unit' => '100G',
                'status' => 'active',
            ],
            [
                'id' => '5',
                'unit' => '125KG',
                'status' => 'active',
            ],
            [
                'id' => '6',
                'unit' => '150G',
                'status' => 'deactive',
            ],
            [
                'id' => '7',
                'unit' => '200G',
                'status' => 'active',
            ],
            [
                'id' => '8',
                'unit' => '2500G',
                'status' => 'deactive',
            ],
            [
                'id' => '9',
                'unit' => '500G',
                'status' => 'deactive',
            ],
            [
                'id' => '10',
                'unit' => '750G',
                'status' => 'deactive',
            ],
            [
                'id' => '11',
                'unit' => '1KG',
                'status' => 'deactive',
            ],
            [
                'id' => '12',
                'unit' => '2KG',
                'status' => 'deactive',
            ],
            [
                'id' => '13',
                'unit' => '5KG',
                'status' => 'deactive',
            ],
            [
                'id' => '14',
                'unit' => '10KG',
                'status' => 'deactive',
            ],
            [
                'id' => '15',
                'unit' => '50ML',
                'status' => 'deactive',
            ],
            [
                'id' => '16',
                'unit' => '100ML',
                'status' => 'deactive',
            ],
            [
                'id' => '17',
                'unit' => '200ML',
                'status' => 'deactive',
            ],
            [
                'id' => '18',
                'unit' => '250ML',
                'status' => 'deactive',
            ],
            [
                'id' => '19',
                'unit' => '500ML',
                'status' => 'deactive',
            ],
            [
                'id' => '20',
                'unit' =>'750ML',
                'status' => 'deactive',
            ],
            [
                'id' => '21',
                'unit' => '1L',
                'status' => 'deactive',
            ],
            [
                'id' => '22',
                'unit' => '2L',
                'status' => 'deactive',
            ],
            [
                'id' => '23',
                'unit' => '5L',
                'status' => 'deactive',
            ],
            [
                'id' => '24',
                'unit' => '10L',
                'status' => 'deactive',
            ]
        ]);
        
    }
}
