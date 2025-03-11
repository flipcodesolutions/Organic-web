<?php

namespace Database\Seeders;
use App\Models\Review as ModelsReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsReview::insert([
            'id'         => '1',
            'rev_date'   => '2024-03-01 12:30:00', // Direct date format
            'product_id' => '1',
            'user_id'    => '6',
            'message'    => 'Great product! Highly recommended.',
            'star'       => '5',
            'status'     => 'active',
        ],
    
        [
            'id'         => '2',
            'rev_date'   => '2024-02-25 09:45:00',
            'product_id' => '2',
            'user_id'    => '7',
            'message'    => 'Average quality, could be better.',
            'star'       => '3',
            'status'     => 'active',
        ],

        [
            'id'         => '3',
            'rev_date'   => '2024-01-15 18:20:00',
            'product_id' => '3',
            'user_id'    => '8',
            'message'    => 'Item arrived late but quality is good.',
            'star'       => '4',
            'status'     => 'deactive',
        ],

        [
            'id'         => '4',
            'rev_date'   => '2024-03-05 14:10:00',
            'product_id' => '4',
            'user_id'    => '9',
            'message'    => 'Excellent packaging and fast delivery.',
            'star'       => '5',
            'status'     => 'active',
        ],

        [
            'id'         => '5',
            'rev_date'   => '2024-02-20 10:30:00',
            'product_id' => '5',
            'user_id'    => '10',
            'message'    => 'Not as described, disappointed.',
            'star'       => '2',
            'status'     => 'deactive',
        ],

        [
            'id'         => '6',
            'rev_date'   => '2024-03-08 09:00:00',
            'product_id' => '6',
            'user_id'    => '5',
            'message'    => 'Great value for money.',
            'star'       => '4',
            'status'     => 'active',
        ],

        [
            'id'         => '7',
            'rev_date'   => '2024-02-28 16:45:00',
            'product_id' => '7',
            'user_id'    => '6',
            'message'    => 'Product was broken on arrival.',
            'star'       => '1',
            'status'     => 'deactive',
        ],

        [
            'id'         => '8',
            'rev_date'   => '2024-01-30 11:25:00',
            'product_id' => '6',
            'user_id'    => '7',
            'message'    => 'Satisfied with the purchase.',
            'star'       => '4',
            'status'     => 'active',
        ],

        [
            'id'         => '9',
            'rev_date'   => '2024-03-02 08:30:00',
            'product_id' => '5',
            'user_id'    => '8',
            'message'    => 'Average quality, but fair price.',
            'star'       => '3',
            'status'     => 'active',
        ],

        [
            'id'         => '10',
            'rev_date'   => '2024-02-18 13:40:00',
            'product_id' => '4',
            'user_id'    => '9',
            'message'    => 'Amazing experience! Will buy again.',
            'star'       => '5',
            'status'     => 'active',
        ],
        
        [
            'id'         => '11',
            'rev_date'   => '2024-03-04 14:55:00',
            'product_id' => '3',
            'user_id'    => '10',
            'message'    => 'Did not meet my expectations.',
            'star'       => '2',
            'status'     => 'deactive',
        ]);
    }
}
