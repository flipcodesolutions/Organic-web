<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Commands\CreatePermission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            CityMasterSeeder::class
        ]);

        $this->call([
            Cms_Masterseeder::class
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $permission = new PermissionTableSeeder();
        // $permission->run();

        // $admin = new CreateAdminUserSeeder();
        // $admin->run();

        // $category = new CategorySeeder();
        // $category->run();


    }
}

