<?php

namespace Database\Seeders;
use App\Models\Purchase as ModelsPurchase;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        ModelsPurchase::insert([
            'id' => '1',
            'product_id' => '1',
            'date' => '2025-03-13',
            'price' => '560',
            'qty' => '1',
            'status' => 'active'
        ]); 
   }
}
