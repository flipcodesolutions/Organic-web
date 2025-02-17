<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Contact as ModelsContact;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsContact::create([
            'subject'=>'Vegetavle Enqiry',
            'message'=>'Let me know if Brocolly available or not.',
            'contact'=>'9898989898',
            'email'=>'customer@gmail.com',
           'status'=>'active',
       ]);
    }
}
