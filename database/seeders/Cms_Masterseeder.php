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
        ModelsCms_Master::insert([
            
              [
                    'title' => 'About Us',
                    'titleGuj' => 'અમારા વિશે',
                    'titleHin' => 'हमारे बारे में',
                    'slug' => 'about-us',
                    'description' => 'Welcome to FreshMart! We deliver fresh fruits and vegetables directly from farms to your doorstep in Surendranagar.',
                    'descriptionGuj' => 'ફ્રેશમાર્ટમાં આપનું સ્વાગત છે! અમે તાજા ફળો અને શાકભાજી સીધા ખેડુતો પાસેથી તમારા દરવાજા પર પહોંચાડીએ છીએ.',
                    'descriptionHin' => 'फ्रेशमार्ट में आपका स्वागत है! हम ताजे फल और सब्जियाँ सीधे खेतों से आपके दरवाजे तक पहुँचाते हैं।',
                ],
                [
                    'title' => 'Privacy Policy',
                    'titleGuj' => 'ગોપનીયતા નીતિ',
                    'titleHin' => 'गोपनीयता नीति',
                    'slug' => 'privacy-policy',
                    'description' => 'We respect your privacy. Our policy explains how we collect and use your data when you shop with us.',
                    'descriptionGuj' => 'અમે તમારી ગોપનીયતાને માન આપીએ છીએ. અમારી નીતિ એ વ્યાખ્યાયિત કરે છે કે અમે કેવી રીતે તમારી માહિતી એકઠી કરી અને તેનો ઉપયોગ કરીએ છીએ.',
                    'descriptionHin' => 'हम आपकी गोपनीयता का सम्मान करते हैं। हमारी नीति यह बताती है कि जब आप हमारे साथ खरीदारी करते हैं तो हम आपके डेटा को कैसे एकत्र और उपयोग करते हैं।',
                ],
                [
                    'title' => 'Terms & Conditions',
                    'titleGuj' => 'નીતિ અને શરતો',
                    'titleHin' => 'नियम और शर्तें',
                    'slug' => 'terms-and-conditions',
                    'description' => 'By placing an order on FreshMart, you agree to our terms regarding delivery.',
                    'descriptionGuj' => 'ફ્રેશમાર્ટ પર આદેશ મુકીને, તમે અમારી ડિલિવરી સંબંધી નિયમોનો સ્વીકાર કરો છો.',
                    'descriptionHin' => 'फ्रेशमार्ट पर ऑर्डर देकर, आप हमारी डिलीवरी से संबंधित शर्तों से सहमत होते हैं।',
                ],
                [
                    'title' => 'Return Policy',
                    'titleGuj' => 'પરત નીતિ',
                    'titleHin' => 'वापसी नीति',
                    'slug' => 'return-policy',
                    'description' => 'If you receive damaged or rotten produce, you can request a return within 24 hours of delivery.',
                    'descriptionGuj' => 'જો તમને નુકસાન પામેલ અથવા સડેલું મંચી મળશે, તો તમે ડિલિવરીની 24 કલાકની અંદર પાછું મોકલવાનો વિનંતી કરી શકો છો.',
                    'descriptionHin' => 'यदि आपको क्षतिग्रस्त या सड़ा हुआ उत्पाद मिलता है, तो आप डिलीवरी के 24 घंटे के भीतर रिटर्न का अनुरोध कर सकते हैं।',
                ],
                [
                    'title' => 'Refund Cancellation Policy',
                    'titleGuj' => 'રિફંડ રદ કરવાની નીતિ',
                    'titleHin' => 'रिफंड रद्दीकरण नीति',
                    'slug' => 'refund-cancellation-policy',
                    'description' => 'Refunds will be processed based on our policy, and cancellations are accepted within a specified time frame.',
                    'descriptionGuj' => 'રિફંડ અમારા નિયમો પર આધારિત પ્રક્રિયા કરવામાં આવશે અને રદ કરવામાં આવશે.',
                    'descriptionHin' => 'रिफंड हमारी नीति के आधार पर संसाधित किए जाएंगे, और रद्दीकरण एक निर्दिष्ट समय सीमा के भीतर स्वीकार किए जाते हैं।',
                ],
                [
                    'title' => 'Shipping Policy',
                    'titleGuj' => 'શિપિંગ નીતિ',
                    'titleHin' => 'शिपिंग नीति',
                    'slug' => 'shipping-policy',
                    'description' => 'We provide fast and reliable shipping across Surendranagar to deliver your fresh produce.',
                    'descriptionGuj' => 'અમે સુરેન્દ્રનગરમાં ઝડપી અને વિશ્વસનીય શિપિંગ સેવા પ્રદાન કરીએ છીએ જેથી તમારા તાજા ઉત્પાદનો મૌલિક રીતે પહોંચાડવામાં આવે.',
                    'descriptionHin' => 'हम सुरेन्द्रनगर में तेज़ और विश्वसनीय शिपिंग सेवा प्रदान करते हैं ताकि आपके ताजे उत्पाद समय पर पहुँच सकें।',
                ]
                        
    ]);
        
    }
}
