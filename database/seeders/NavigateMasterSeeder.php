<?php

namespace Database\Seeders;
use App\Models\NavigateMaster as ModelsNavigateMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigateMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsNavigateMaster::insert(
            [
            'id' => '1',
            'screenname'=>'Home',
            'status'=>'active',
        ],

        [
        'id' => '2',
        'screenname'=>'Vegetable',
        'status'=>'active',
        ]);
       
    }
} 
