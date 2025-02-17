<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PointPer as ModelsPointPer;
class PointPerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsPointPer::create([
            'per'=>'250',
           'status'=>'active',
       ]);

        ModelsPointPer::create([
            'per'=>'100',
            'status'=>'active',
        ]);

        ModelsPointPer::create([
            'per'=>'500',
        'status'=>'active',
        ]);

        ModelsPointPer::create([
            'per'=>'1',
        'status'=>'active',
        ]);


    }
}
