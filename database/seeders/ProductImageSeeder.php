<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Productimage as ModelsProductimage;


class ProductimageSeeder extends Seeder
{
    public function run(): void
    {
        ModelsProductimage::insert([
            [
                'id' => '1',
                'productid' => '1',
                'url' => 'productImages/AashirvaadAtta.jpeg',
                'type' => 'photo',
                
            ],
            [
                'id' => '2',
                'productid' => '2',
                'url' => 'productImages/DaawatRozanaBasmatiRice.jpeg',
                'type' => 'photo',
            ],
            [
                'id' => '3',
                'productid' => '3',
                'url' => 'productImages/FORTUNEXpertProImmunityBlendedOil.jpeg',
                'type' => 'photo',
            ],
            [
                'id' => '4',
                'productid' => '4',
                'url' => 'productImages/AashirvaadSvastiPureCowGhee.jpeg',
                'type' => 'photo',
            ],
            [
                'id' => '5',
                'productid' => '5',
                'url' => 'productImages/IndiaGateClassicBasmatiRice.jpeg',
                'type' => 'photo',
            ],
            [
                'id' => '6',
                'productid' => '6',
                'url' => 'productImages/PatanjaliCowGhee.jpeg',
                'type' => 'photo',
            ],
            [
                'id' => '7',
                'productid' => '7',
                'url' => 'productImages/FORTUNEMustardOil.jpeg',
                'type' => 'photo',
            ],

            [
                'id' => '8',
                'productid' => '8',
                'url' => 'productImages/AmulBuffaloGhee.jpeg',
                'type' => 'photo',
            ],

            [
                'id' => '9',
                'productid' => '9',
                'url' => 'productImages/TataSampanChanaDalFineBesan.jpeg',
                'type' => 'photo',
            ],

            [
                'id' => '10',
                'productid' => '10',
                'url' => 'productImages/BrownRiceOrganicIndia.jpeg',
                'type' => 'photo',
            ],
        ]);
        
    }
}
