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
                'categoryName' => 'ATTA',
                'categoryNameGuj' => 'લોટ',
                'categoryNameHin' => 'आटा',
                'categoryDescription' => 'Atta is whole wheat flour used to make chapatis and bread.',
                'categoryDescriptionGuj' => 'લોટ ઘઉંનું પીષેલું લોટ છે જેમાંથી રોટલી અને બ્રેડ બનાવાય છે.',
                'categoryDescriptionHin' => 'आटा गेहूं का आटा है जिसका उपयोग रोटी और ब्रेड बनाने में होता है। ',
                'cat_icon' => 'categoryImages/ATTA.jpeg',
                'parent_category_id' => '0',
                'status' => 'active'
            ],

            [
                'id' => '2',
                'categoryName' => 'RICE',
                'categoryNameGuj' => 'ચોખા',
                'categoryNameHin' => 'चावल',
                'categoryDescription' => ' Rice is a staple grain consumed worldwide in various dishes.',
                'categoryDescriptionGuj' => ' ચોખા એક મુખ્ય અનાજ છે જે વિશ્વભરમાં વિવિધ વાનગીઓમાં ખવાય છે.',
                'categoryDescriptionHin' => 'चावल एक मुख्य अनाज है जिसे दुनियाभर में विभिन्न व्यंजनों में खाया जाता है। ',
                'cat_icon' => 'categoryImages/RICE.jpeg',
                'parent_category_id' => '0',
                'status' => 'active'
            ],

            [
                'id' => '3',
                'categoryName' => 'OIL',
                'categoryNameGuj' => 'તેલ',
                'categoryNameHin' => 'तेल',
                'categoryDescription' => 'Oil is a cooking essential used for frying and seasoning.',
                'categoryDescriptionGuj' => ' તેલ રસોઈમાં જરૂરી છે અને તે તળવા અને મસાલા માટે વપરાય છે.',
                'categoryDescriptionHin' => 'तेल एक आवश्यक वस्तु है जो तलने और मसाले के लिए उपयोग होती है।',
                'cat_icon' => 'categoryImages/OIL.jpeg',
                'parent_category_id' => '0',
                'status' => 'active'
            ],

            [
                'id' => '4',
                'categoryName' => 'GHEE',
                'categoryNameGuj' => 'ઘી',
                'categoryNameHin' => 'घी',
                'categoryDescription' => ' Ghee is clarified butter used for cooking and enhancing flavor.',
                'categoryDescriptionGuj' => 'ઘી શુદ્ધ માખણ છે જે રસોઈ અને સ્વાદ વધારવા માટે વપરાય છે.',
                'categoryDescriptionHin' => 'घी एक शुद्ध मक्खन है जो पकाने और स्वाद बढ़ाने में उपयोग होता है।',
                'cat_icon' => 'categoryImages/GHEE.jpeg',
                'parent_category_id' => '0',
                'status' => 'active'
            ],

            [
                'id' => '5',
                'categoryName' => 'Wheat Flour (Whole Wheat Atta)',
                'categoryNameGuj' => 'ઘઉંનો લોટ',
                'categoryNameHin' => 'गेहूं का आटा',
                'categoryDescription' => ' Wheat flour is made from whole wheat grains and is used for making chapatis.',
                'categoryDescriptionGuj' => 'ઘઉંનો લોટ આખા ઘઉંમાંથી બનાવાય છે અને રોટલી બનાવવામાં વપરાય છે.',
                'categoryDescriptionHin' => 'गेहूं का आटा साबुत गेहूं से बनाया जाता है और रोटियां बनाने में उपयोग होता है।',
                'cat_icon' => 'categoryImages/WheatFlour.jpeg',
                'parent_category_id' => '1',
                'status' => 'active'
            ],

            [
                'id' => '6',
                'categoryName' => 'Maida (Refined Flour)',
                'categoryNameGuj' => 'મેદા',
                'categoryNameHin' => 'मैदा',
                'categoryDescription' => ' Maida is refined wheat flour used for baking and making snacks.',
                'categoryDescriptionGuj' => 'મેદા શુદ્ધ ઘઉંનો લોટ છે જે બેકિંગ અને નાસ્તા બનાવવામાં વપરાય છે.',
                'categoryDescriptionHin' => 'मैदा परिष्कृत गेहूं का आटा है जो बेकिंग और स्नैक्स बनाने में उपयोग होता है।',
                'cat_icon' => 'categoryImages/MaidaFlour.jpeg',
                'parent_category_id' => '1',
                'status' => 'active'
            ],

            [
                'id' => '7',
                'categoryName' => 'Besan (Gram Flour)',
                'categoryNameGuj' => 'બેસન',
                'categoryNameHin' => 'बेसन',
                'categoryDescription' => ' Besan is flour made from chickpeas, used for making snacks and sweets.',
                'categoryDescriptionGuj' => ' બેસન ચણાનો લોટ છે, જે નાસ્તા અને મીઠાઈઓમાં વપરાય છે.',
                'categoryDescriptionHin' => 'बेसन चने से बना आटा है, जिसका उपयोग नाश्ते और मिठाइयों में होता है।',
                'cat_icon' => 'categoryImages/BesanFLour.jpeg',
                'parent_category_id' => '1',
                'status' => 'active'
            ],

            [
                'id' => '8',
                'categoryName' => 'Basmati Rice',
                'categoryNameGuj' => 'બાસમતી ચોખા',
                'categoryNameHin' => 'बासमती चावल',
                'categoryDescription' => ' Basmati rice is a long-grain, aromatic rice known for its fragrance and fluffy texture, often used in biryanis and pulao.',
                'categoryDescriptionGuj' => 'બાસમતી ચોખા લાંબા અને સુગંધિત હોય છે, જે બિરયાની અને પુલાવમાં વપરાય છે.',
                'categoryDescriptionHin' => 'बासमती चावल एक लंबा और सुगंधित चावल है, जो अपनी खुशबू और नरम बनावट के लिए जाना जाता है। इसे बिरयानी और पुलाव में उपयोग किया जाता है।',
                'cat_icon' => 'categoryImages/BasmatiRice.jpeg',
                'parent_category_id' => '2',
                'status' => 'active'
            ],

            [
                'id' => '9',
                'categoryName' => 'Brown Rice',
                'categoryNameGuj' => 'બ્રાઉન ચોખા',
                'categoryNameHin' => 'ब्राउन चावल',
                'categoryDescription' => 'Brown rice is whole-grain rice with the outer bran layer intact, known for its high fiber and nutritional value.',
                'categoryDescriptionGuj' => 'બ્રાઉન ચોખા આખા અનાજથી બનેલા છે, જેમાં બહારની ચોખાની પટલી રહે છે. તે ફાઈબર અને પોષક તત્વોથી ભરપૂર છે.',
                'categoryDescriptionHin' => ' ब्राउन चावल साबुत अनाज है जिसमें बाहरी चोकर की परत बनी रहती है। यह उच्च फाइबर और पोषण से भरपूर होता है।',
                'cat_icon' => 'categoryImages/BorwnRice.jpeg',
                'parent_category_id' => '2',
                'status' => 'active'
            ],

            [
                'id' => '10',
                'categoryName' => 'Sona Masoori Rice',
                'categoryNameGuj' => 'સોના મસૂરી ચોખા',
                'categoryNameHin' => 'सोना मसूरी चावल',
                'categoryDescription' => 'Sona Masoori is a medium-grain, lightweight, and aromatic rice commonly used for everyday meals.',
                'categoryDescriptionGuj' => 'સોના મસૂરી મધ્યમ દાણા વાળો, હલકો અને સુગંધિત ચોખો છે, જે રોજિંદા ભોજન માટે વપરાય છે.',
                'categoryDescriptionHin' => 'सोना मसूरी एक मध्यम आकार का हल्का और सुगंधित चावल है, जो दैनिक भोजन में उपयोग होता है।',
                'cat_icon' => 'categoryImages/SonaMasooriRice.jpeg',
                'parent_category_id' => '2',
                'status' => 'active'
            ],

            [
                'id' => '11',
                'categoryName' => 'Mustard Oil',
                'categoryNameGuj' => 'રાઈનું તેલ',
                'categoryNameHin' => 'सरसों का तेल',
                'categoryDescription' => ' Mustard oil is a pungent oil commonly used in cooking and known for its antibacterial properties.',
                'categoryDescriptionGuj' => 'રાઈનું તેલ તીખું હોય છે અને રસોઈ તથા ઔષધીય ઉપયોગ માટે જાણીતું છે.',
                'categoryDescriptionHin' => 'सरसों का तेल एक तीव्र सुगंध वाला तेल है, जिसका उपयोग पकाने और औषधीय गुणों के लिए किया जाता है।',
                'cat_icon' => 'categoryImages/MustardOil.jpeg',
                'parent_category_id' => '3',
                'status' => 'active'
            ],

            [
                'id' => '12',
                'categoryName' => 'Coconut Oil',
                'categoryNameGuj' => 'નારિયેળ તેલ',
                'categoryNameHin' => 'नारियल का तेल',
                'categoryDescription' => 'Coconut oil is a versatile oil used in cooking, skincare, and hair care.',
                'categoryDescriptionGuj' => 'નારિયેળ તેલ બહુવિધ ઉપયોગ માટે જાણીતું છે, જેમ કે રસોઈ, ત્વચા અને વાળની સંભાળ.',
                'categoryDescriptionHin' => 'नारियल का तेल बहुउपयोगी है, जो खाना पकाने, त्वचा और बालों की देखभाल में इस्तेमाल होता है।',
                'cat_icon' => 'categoryImages/CoconutOil.jpeg',
                'parent_category_id' => '3',
                'status' => 'active'
            ],

            [
                'id' => '13',
                'categoryName' => 'Groundnut Oil (Peanut Oil)',
                'categoryNameGuj' => 'મગફળીનું તેલ',
                'categoryNameHin' => 'मूंगफली का तेल',
                'categoryDescription' => ' Groundnut oil is a mild-flavored oil, widely used for frying and deep-frying.',
                'categoryDescriptionGuj' => 'મગફળીનું તેલ હલકું અને તળવા માટે પ્રચલિત છે.',
                'categoryDescriptionHin' => ' मूंगफली का तेल हल्के स्वाद वाला होता है, जिसे तलने के लिए उपयोग किया जाता है।',
                'cat_icon' => 'categoryImages/GroundNutOil.jpeg',
                'parent_category_id' => '3',
                'status' => 'active'
            ],

            [
                'id' => '14',
                'categoryName' => 'Cow Ghee',
                'categoryNameGuj' => 'ગાયનું ઘી',
                'categoryNameHin' => 'गाय का घी',
                'categoryDescription' => 'Cow ghee is a traditional ghee made from cow’s milk, known for its digestive and healing properties.',
                'categoryDescriptionGuj' => 'ગાયનું ઘી ગાયના દૂધમાંથી બને છે, જે પાચન અને આરોગ્ય માટે લાભકારી છે.',
                'categoryDescriptionHin' => 'गाय का घी गाय के दूध से बना होता है, जो पाचन और उपचार में सहायक होता है।',
                'cat_icon' => 'categoryImages/CowGhee.jpeg',
                'parent_category_id' => '4',
                'status' => 'active'
            ],

            [
                'id' => '15',
                'categoryName' => 'Buffalo Ghee',
                'categoryNameGuj' => 'ભેંસનું ઘી',
                'categoryNameHin' => 'भैंस का घी',
                'categoryDescription' => 'English: Buffalo ghee is thicker and creamier than cow ghee, providing more energy and rich taste.',
                'categoryDescriptionGuj' => 'ભેંસનું ઘી વધુ ઘાટું અને ક્રીમી છે, જે વધુ ઊર્જા અને વધુ સ્વાદ આપે છે.',
                'categoryDescriptionHin' => 'भैंस का घी गाढ़ा और मलाईदार होता है, जो अधिक ऊर्जा और समृद्ध स्वाद देता है।',
                'cat_icon' => 'categoryImages/BuffaloGhee.jpeg',
                'parent_category_id' => '4',
                'status' => 'active'
            ],

            [
                'id' => '16',
                'categoryName' => 'Desi Ghee',
                'categoryNameGuj' => 'દેશી ઘી',
                'categoryNameHin' => 'देसी घी',
                'categoryDescription' => ' Desi ghee is a pure, homemade-style ghee known for its authentic aroma and health benefits.',
                'categoryDescriptionGuj' => 'દેશી ઘી શુદ્ધ અને ઘરેલું શૈલીમાં બનેલું છે, જે અસલ સુગંધ અને આરોગ્ય લાભ આપે છે',
                'categoryDescriptionHin' => 'देसी घी शुद्ध और घर में बनाया गया घी है, जो असली सुगंध और स्वास्थ्य लाभ देता है।',
                'cat_icon' => 'categoryImages/DesiGhee.jpeg',
                'parent_category_id' => '4',
                'status' => 'active'
            ],
           
        ]);
        
    }
}
