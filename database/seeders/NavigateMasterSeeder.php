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
        ModelsNavigateMaster::create([
            'screenname'=>'Home',
           'status'=>'active',
       ]);

       ModelsNavigateMaster::create([
        'screenname'=>'Vegetable',
       'status'=>'active',
   ]);
       
    }
} 
