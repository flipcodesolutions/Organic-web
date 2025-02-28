<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\FaqSeeder as ModelsFaq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        ModelsFaq::insert([
            [
                'id' => '1',
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers for payments.',
            ],
            [
                'id' => '2',
                'question' => 'How can I track my order?',
                'answer' => 'Once your order has shipped, you will receive an email with tracking information. You can use this information to track your order through the shipping provider’s website.',
            ],
            [
                'id' => '3',
                'question' => 'Can I return or exchange an item?',
                'answer' => 'Yes, we offer a 30-day return policy. Items must be returned in their original condition with proof of purchase. For exchanges, you can contact our customer service team.',
            ],
            [
                'id' => '4',
                'question' => 'How do I contact customer support?',
                'answer' => 'You can contact our customer support team via email at support@example.com or through the live chat feature on our website.',
            ],
            [
                'id' => '5',
                'question' => 'Do you ship internationally?',
                'answer' => 'Yes, we offer international shipping to select countries. Shipping fees and delivery times vary depending on the destination.',
            ],
            [
                'id' => '6',
                'question' => 'How do I cancel my order?',
                'answer' => 'Orders can be cancelled within 24 hours of placing them. Please contact our support team immediately to request a cancellation.',
            ],
        ]);
    }
}
