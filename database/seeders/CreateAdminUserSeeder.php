<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '1234567890',
            'role' => 'admin',
            'pro_pic' => 'default.png',
            'is_verfiy_email' => 'yes',
            'is_verify_phone' => 'yes',
            'status' => 'active',
            'is_special' => 'yes',
            'default_language' => 'eng',

        ]);

    }
}
