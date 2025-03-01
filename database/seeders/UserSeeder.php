<?php

namespace Database\Seeders;
use App\Models\User as ModelsUser;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUser::insert([
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'6363636363',
                'role'=>'admin',
                'pro_pic'=>'adminImage.png',
                'status'=>'active',
                'default_language'=>'gujarati',
            ],

            [
                'name'=>'Customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'9494949494',
                'role'=>'Customer',
                'pro_pic'=>'CustomerImage.jpeg',
                'status'=>'active',
                'default_language'=>'english',
            ],

            [
                'name'=>'Vendor',
                'email'=>'vendor@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7575757575',
                'role'=>'Vendor',
                'pro_pic'=>'VendorImage.jpeg',
                'status'=>'active',
                'default_language'=>'gujarati',
            ],

            [
                'name'=>'Manager',
                'email'=>'manager@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7272727272',
                'role'=>'Manager',
                'pro_pic'=>'ManagerImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ]
        ]);
        

    }
}
