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
        ModelsPointPer::insert([
            [
                'per' => '50',
                'status' => 'active',
            ],
           
        ]);
        


    }
}
