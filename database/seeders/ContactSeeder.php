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
        ModelsContact::insert([
            [
                'subject' => 'Vegetable Enquiry',
                'message' => 'Let me know if Broccoli is available or not.',
                'contact' => '9898989898',
                'email' => 'customer@gmail.com',
                'status' => 'active',
            ],
            [
                'subject' => 'Fruit Enquiry',
                'message' => 'Can you confirm if Apples are in stock?',
                'contact' => '9876543210',
                'email' => 'another.customer@example.com',
                'status' => 'deactive',
            ],
            [
                'subject' => 'Order Status',
                'message' => 'When will my order be delivered?',
                'contact' => '9123456789',
                'email' => 'order.customer@mail.com',
                'status' => 'active',
            ],
            [
                'subject' => 'Discount Inquiry',
                'message' => 'Are there any ongoing discounts on vegetables?',
                'contact' => '9988776655',
                'email' => 'discount.query@service.com',
                'status' => 'active',
            ],
            [
                'subject' => 'Product Availability',
                'message' => 'Is Spinach available in the local market?',
                'contact' => '9988775566',
                'email' => 'spinach.avail@mail.com',
                'status' => 'deactive',
            ],
        ]);
        
    }
}
