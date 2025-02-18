<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\Cms_Master as ModelsCms_Master;  // Add this line

class Cms_Masterseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            ModelsCms_Master::create([
                'title' => 'What is Lorem Ipsum?',
                'titleGuj' => 'લોરેમ ઇપ્સમ શું છે?',
                'titleHin' => 'लोरेम इप्सम क्या है?',
                'slug' => 'what-is-lorem-ipsum',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'descriptionGuj' => 'લોરેમ ઇપ્સમ મુદ્દો માત્ર છબી અને ટાઇપસેટિંગ ઉદ્યોગનો ડમી ટેક્સ્ટ છે.',
                'descriptionHin' => 'लोरेम इप्सम छपाई और टाइपसेटिंग उद्योग का केवल डमी पाठ है।',
            ]);
    }
}
