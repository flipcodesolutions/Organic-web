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
        ModelsLandmarkMaster::insert([
            
                [
                    'city_id' => '1',
                    'landmark_eng' => 'FlipCode Solution',
                    'landmark_hin' => 'फ्लिपकोड सॉल्यूशन',
                    'landmark_guj' => 'ફ્લિપકોડ સોલ્યૂશન',
                    'latitude' => '22.728392',
                    'longitude' => '71.637077',
                ],
                [
                    'city_id' => '2',
                    'landmark_eng' => 'Surendranagar Junction',
                    'landmark_hin' => 'सुरेंद्रनगर जंक्शन',
                    'landmark_guj' => 'સુરેન્દ્રનગર જંકશન',
                    'latitude' => '22.723000',
                    'longitude' => '71.637500',
                ],
                [
                    'city_id' => '3',
                    'landmark_eng' => 'Sardar Vallabhbhai Patel Circle',
                    'landmark_hin' => 'सरदार वल्लभभाई पटेल सर्कल',
                    'landmark_guj' => 'સર્દાર વલ્લભભાઈ પટેલ સર્કલ',
                    'latitude' => '22.728100',
                    'longitude' => '71.632900',
                ],
                [
                    'city_id' => '4',
                    'landmark_eng' => 'Surendranagar District Court',
                    'landmark_hin' => 'सुरेंद्रनगर जिला न्यायालय',
                    'landmark_guj' => 'સુરેન્દ્રનગર જિલ્લા ન્યાયાલય',
                    'latitude' => '22.725500',
                    'longitude' => '71.638900',
                ],
                [
                    'city_id' => '5',
                    'landmark_eng' => 'Dholera SIR',
                    'landmark_hin' => 'ढोलेरा SIR',
                    'landmark_guj' => 'ઢોલેરા SIR',
                    'latitude' => '22.800000',
                    'longitude' => '71.650000',
                ],
                [
                    'city_id' => '6',
                    'landmark_eng' => 'Ranasthan Village',
                    'landmark_hin' => 'रणस्थान गाँव',
                    'landmark_guj' => 'રણસ્થાન ગામ',
                    'latitude' => '22.725800',
                    'longitude' => '71.640000',
                ]
            
            
        ]);
        
    }
}
