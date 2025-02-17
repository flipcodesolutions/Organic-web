<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LandmarkMaster as ModelsLandmarkMaster;

class LandmarkMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsLandmarkMaster::create([
            'city_id'=>'1',
            'landmark_eng'=>'FlipCode Solution',
            'landmark_hin'=>'फ्लिपकोड सॉल्यूशन',
            'landmark_guj'=>'ફ્લિપકોડ સોલ્યૂશન',

           'latitude'=>'22.728392',
           'longitude'=>'71.637077',

       ]);
    }
}
