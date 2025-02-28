<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Commands\CreatePermission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            // UserSeeder::class,
             //CityMasterSeeder::class,
             //LandmarkMasterSeeder::class,
             //ContactSeeder::class,
            // PointPerSeeder::class,
           // DeliverySlotSeeder::class,
           // UnitMasterSeeder::class,
            //NavigateMasterSeeder::class,
            //Cms_Masterseeder::class,
            //CategorySeeder::class,
            //ProductImageSeeder::class,
            //ProductSeeder::class,
            UnitSeeder::Class
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
