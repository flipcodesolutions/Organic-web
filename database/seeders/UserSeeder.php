<?php

namespace Database\Seeders;
use App\Models\User as ModelsUser;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUser::create([
            'name'=>'xyx',
            'email'=>'xyz@gmail.com',
            'password'=>'xyz123',
            'phone'=>'6363636363',
            'role'=>'admin',
            'pro_pic'=>'user_profile/adminImage.png',
            'status'=>'active',
            'default_language'=>'gujarati',
       ]);

        ModelsUser::create([
            'name'=>'gunjan',
            'email'=>'gunjan@gmail.com',
            'password'=>'123',
            'phone'=>'9494949494',
            'role'=>'Customer',
            'pro_pic'=>'public\image\CustomerImage.jpeg',
            'status'=>'active',
            'default_language'=>'english',
        ]);

        ModelsUser::create([
            'name'=>'abc',
            'email'=>'abc@gmail.com',
            'password'=>'abc123',
            'phone'=>'7575757575',
            'role'=>'Vendor',
            'pro_pic'=>'public\image\VendorImage.jpeg',
            'status'=>'active',
            'default_language'=>'gujarati',
        ]);


        ModelsUser::create([
            'name'=>'pqr',
            'email'=>'pqr@gmail.com',
            'password'=>'pqr123',
            'phone'=>'7272727272',
            'role'=>'Manager',
            'pro_pic'=>'public\image\ManagerImage.jpeg',
            'status'=>'active',
            'default_language'=>'English',
        ]);

    }
}
