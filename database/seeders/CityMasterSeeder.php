<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'area_hin' => 'कालावड रोड',
                'area_guj' => 'કાલાવડ રોડ'
            ],
            [
                'city_name_eng' => 'Morbi',
                'city_name_hin' => 'मोरबी',
                'city_name_guj' => 'મોરબી',
                'pincode' => '363641',
                'area_eng' => 'Ravapar Road',
                'area_hin' => 'रवापर रोड',
                'area_guj' => 'રવાપર રોડ'
            ],
            [
                'city_name_eng' => 'Vadodara',
                'city_name_hin' => 'वडोदरा',
                'city_name_guj' => 'વડોદરા',
                'pincode' => '390001',
                'area_eng' => 'Alkapuri',
                'area_hin' => 'अल्कापुरी',
                'area_guj' => 'અલકાપुरी'
            ],
            [
                'city_name_eng' => 'Gandhinagar',
                'city_name_hin' => 'गांधीनगर',
                'city_name_guj' => 'ગાંધીનગર',
                'pincode' => '382010',
                'area_eng' => 'Sector 21',
                'area_hin' => 'सेक्टर 21',
                'area_guj' => 'સેક્ટર 21'
            ],
            [
                'city_name_eng' => 'Bhavnagar',
                'city_name_hin' => 'भावनगर',
                'city_name_guj' => 'ભાવનગર',
                'pincode' => '364001',
                'area_eng' => 'Gajera',
                'area_hin' => 'गजे़रा',
                'area_guj' => 'ગજેરી'
            ],
            [
                'city_name_eng' => 'Jamnagar',
                'city_name_hin' => 'जामनगर',
                'city_name_guj' => 'જામનગર',
                'pincode' => '361001',
                'area_eng' => 'Panchvati',
                'area_hin' => 'पंचवटी',
                'area_guj' => 'પંચવટી'
            ]
        ]);
        
        
    }
}
