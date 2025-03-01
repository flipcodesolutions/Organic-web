<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category as ModelsCategory;


class CategorySeeder extends Seeder
{
    public function run(): void
    {
        ModelsCategory::insert([
            [
                'id' => '1',
                'categoryName' => 'Vegetables',
                'categoryNameGuj' => ' सब्ज़ियाँ ',
                'categoryNameHin' => 'શાકભાજી ',
                'categoryDescription' => 'Various types of vegetables.',
                'categoryDescriptionGuj' => 'વિવિધ પ્રકારની શાકભાજી',
                'categoryDescriptionHin' => ' विभिन्न प्रकार की सब्ज़ियाँ',
                'cat_icon' => '',
                'parent_category_id' => '',
            ],
            [
                'id' => '2',
                'categoryName' => 'Fruits',
                'categoryNameGuj' => ' फल ',
                'categoryNameHin' => 'ફળ',
                'categoryDescription' => 'All sorts of fresh fruits.',
                'categoryDescriptionGuj' => 'તમામ પ્રકારના તાજા ફળ.',
                'categoryDescriptionHin' => 'सभी प्रकार के ताजे फल.',
                'cat_icon' => '',
                'parent_category_id' => '',
            ],
            [
                'id' => '3',
                'categoryName' => 'Aloo pyaj',
                'categoryNameGuj' => 'બટાકા ડુંગળી',
                'categoryNameHin' => 'आलू प्याज',
                'categoryDescription' => 'A sub-category of vegetables related to potatoes and onions.',
                'categoryDescriptionGuj' => 'બટાકા અને ડુંગળી સાથે સંબંધિત શાકભાજીની પેટા શ્રેણી.',
                'categoryDescriptionHin' => 'आलू और प्याज से संबंधित सब्जियों की उप-श्रेणी।',
                'cat_icon' => '',
                'parent_category_id' => '',
            ],
           
        ]);
        
    }
}
