<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\CityMaster as ModelsCityMaster;

class CityMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsCityMaster::create([
             'city_name_eng'=>'Surendranagar',
             'city_name_hin'=>'सुरेन्द्रनगर',
             'city_name_guj'=>'સુરેન્દ્રનગર',
             'pincode'=>'363030',
            'area_eng'=>'Wadhwan',
            'area_hin'=>'वढवान',
            'area_guj'=>'વઢવાણ'
        ]);
    }
}
