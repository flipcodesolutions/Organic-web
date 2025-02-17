<?php

namespace Database\Seeders;
use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUser::create([
            'name'=>'',
            'email'=>'',
            'password'=>'',
            'phone'=>'',
            'role'=>'admin',
            'pro_pic'=>'',
            'is_verfiy_email'=>'',
            'is_verify_phone'=>'',
            'status'=>'',
            'fcm_token'=>'',
            'is_special'=>'',
            'default_language'=>'',
       ]);

        ModelsUser::create([
            'name'=>'',
            'email'=>'',
            'password'=>'',
            'phone'=>'',
            'role'=>'Customer',
            'pro_pic'=>'',
            'is_verfiy_email'=>'',
            'is_verify_phone'=>'',
            'status'=>'',
            'fcm_token'=>'',
            'is_special'=>'',
            'default_language'=>'',
        ]);

        ModelsUser::create([
            'name'=>'',
            'email'=>'',
            'password'=>'',
            'phone'=>'',
            'role'=>'Vendor',
            'pro_pic'=>'',
            'is_verfiy_email'=>'',
            'is_verify_phone'=>'',
            'status'=>'',
            'fcm_token'=>'',
            'is_special'=>'',
            'default_language'=>'',
        ]);

    }
}
