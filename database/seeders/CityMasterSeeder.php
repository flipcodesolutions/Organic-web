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
      
        ModelsCityMaster::insert([
            [
                'city_name_eng' => 'Surendranagar',
                'city_name_hin' => 'सुरेन्द्रनगर',
                'city_name_guj' => 'સુરેન્દ્રનગર',
                'pincode' => '363030',
                'area_eng' => 'Wadhwan',
                'area_hin' => 'वढवान',
                'area_guj' => 'વઢવાણ'
            ],
            [
                'city_name_eng' => 'Ahmedabad',
                'city_name_hin' => 'अहमदाबाद',
                'city_name_guj' => 'અમદાવાદ',
                'pincode' => '380001',
                'area_eng' => 'Maninagar',
                'area_hin' => 'मणिनगर',
                'area_guj' => 'મણિનગર'
            ],
            [
                'city_name_eng' => 'Rajkot',
                'city_name_hin' => 'राजकोट',
                'city_name_guj' => 'રાજકોટ',
                'pincode' => '360001',
                'area_eng' => 'Kalavad Road',
                'area_hin' => 'कलावद रोड',
                'area_guj' => 'કલાવદ રોડ'
            ]
        ]);
        
    }
}
