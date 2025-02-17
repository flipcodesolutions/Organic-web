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
        ModelsUnitMaster::create([
            'unit'=>'250',
           'status'=>'active',
       ]);
    }
}
