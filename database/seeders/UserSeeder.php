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
                'id' => '1',
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'6363636363',
                'role'=>'admin',
                'pro_pic'=>'adminImage.png',
                'status'=>'active',
                'default_language'=>'Gujarati',
            ],

            [
                'id' => '2',
                'name'=>'Vendor',
                'email'=>'vendor@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'9494949494',
                'role'=>'Vendor',
                'pro_pic'=>'VendorImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ],

            [
                'id' => '3',
                'name'=>'Vendor',
                'email'=>'vendor2@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7575757575',
                'role'=>'Vendor',
                'pro_pic'=>'VendorImage.jpeg',
                'status'=>'active',
                'default_language'=>'Gujarati',
            ],

            [
                'id' => '4',
                'name'=>'Manager',
                'email'=>'manager@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7272727272',
                'role'=>'Manager',
                'pro_pic'=>'ManagerImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ],

            [
                'id' => '5',
                'name'=>'Rudrika',
                'email'=>'rudrika@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7171717171',
                'role'=>'customer',
                'pro_pic'=>'CustomerImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ],

            [
                'id' => '6',
                'name'=>'Jinal',
                'email'=>'jinal@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7272727272',
                'role'=>'customer',
                'pro_pic'=>'CustomerImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ],

            [
                'id' => '7',
                'name'=>'Priyanshi',
                'email'=>'priyanshi@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7272727272',
                'role'=>'customer',
                'pro_pic'=>'CustomerImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ],

            [
                'id' => '8',
                'name'=>'Janki',
                'email'=>'janki@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7272727272',
                'role'=>'customer',
                'pro_pic'=>'CustomerImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ],

            [
                'id' => '9',
                'name'=>'Khushi',
                'email'=>'khushi@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7272727272',
                'role'=>'customer',
                'pro_pic'=>'CustomerImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ],

            [
                'id' => '10',
                'name'=>'Arpita',
                'email'=>'arpita@gmail.com',
                'password'=>Hash::make(123456),
                'phone'=>'7272727272',
                'role'=>'customer',
                'pro_pic'=>'CustomerImage.jpeg',
                'status'=>'active',
                'default_language'=>'English',
            ],
        ]);
        

    }
}
