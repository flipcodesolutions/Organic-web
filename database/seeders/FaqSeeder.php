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
                'quwstionGuj' => 'તમે કયા ચુકવણી પદ્ધતિઓ સ્વીકારો છો?',
                'questionHin' => 'आप कौन-कौन से भुगतान के तरीके स्वीकार करते हैं?',
                'answer' => 'We accept credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers for payments.',
                'answerGuj' => 'અમે ચૂકવણી માટે ક્રેડિટ કાર્ડ્સ (વિઝા, માસ્ટરકાર્ડ, અમેરિકન એક્સપ્રેસ), પેપાલ અને બેંક ટ્રાન્સફર સ્વીકારીએ છીએ.',
                'answerHin' => 'हम भुगतान के लिए क्रेडिट कार्ड (वीज़ा, मास्टरकार्ड, अमेरिकन एक्सप्रेस), पेपाल और बैंक ट्रांसफर स्वीकार करते हैं।',
                'status' => 'active'
            ],
            [
                'id' => '2',
                'question' => 'How can I track my order?',
                'questionGuj' => 'હું મારી ઓર્ડર કેવી રીતે ટ્રૅક કરી શકું?',
                'questionHin' => 'मैं अपना ऑर्डर कैसे ट्रैक कर सकता हूँ?',
                'answer' => 'Once your order has shipped, you will receive an email with tracking information. You can use this information to track your order through the shipping provider’s website.',
                'answerGuj' => 'જેમજ તમે ઓર્ડર મોકલશો, ત્યારે તમને ટ્રેકિંગ માહિતી સાથે એક ઇમેઇલ મળશે. તમે આ માહિતીનો ઉપયોગ શીપીંગ પ્રદાતાની વેબસાઇટ દ્વારા તમારા ઓર્ડરને ટ્રૅક કરવા માટે કરી શકો છો.',
                'answerHin' => 'जैसे ही आपका ऑर्डर भेज दिया जाएगा, आपको ट्रैकिंग जानकारी के साथ एक ईमेल प्राप्त होगा। आप इस जानकारी का उपयोग शिपिंग प्रदाता की वेबसाइट के माध्यम से अपने ऑर्डर को ट्रैक करने के लिए कर सकते हैं।',
                'status' => 'active'
            ],
            [
                'id' => '3',
                'question' => 'Can I return or exchange an item?',
                'questionGuj' => 'શું હું આઇટમ પરત કે એક્સચેન્જ કરી શકું?',
                'questionHin' => 'क्या मैं कोई वस्तु वापस या एक्सचेंज कर सकता हूँ?',
                'answer' => 'Yes, we offer a 30-day return policy. Items must be returned in their original condition with proof of purchase. For exchanges, you can contact our customer service team.',
                'answerGuj' => 'હા, અમે 30 દિવસની પરત નીતિ આપીએ છીએ. આઇટમને તેની મૂળ સ્થિતિમાં અને ખરીદીના પુરાવા સાથે પરત કરવી જરૂરી છે. એક્સચેન્જ માટે, તમે અમારી ગ્રાહક સેવા ટીમનો સંપર્ક કરી શકો છો.',
                'answerHin' => 'हाँ, हम 30 दिनों की वापसी नीति प्रदान करते हैं। वस्तुएँ अपनी मूल स्थिति में और खरीद के प्रमाण के साथ वापस की जानी चाहिए। एक्सचेंज के लिए, आप हमारी ग्राहक सेवा टीम से संपर्क कर सकते हैं।',
                'status' => 'active'
            ],
            [
                'id' => '4',
                'question' => 'How do I contact customer support?',
                'questionGuj' => 'હું ગ્રાહક સપોર્ટનો સંપર્ક કેવી રીતે કરી શકું?',
                'questionHin' => 'मैं ग्राहक सहायता से कैसे संपर्क करूँ?',
                'answer' => 'You can contact our customer support team via email at support@example.com or through the live chat feature on our website.',
                'answerGuj' => 'તમે અમારું ગ્રાહક સપોર્ટ ટીમનો સંપર્ક ઈમેઇલ દ્વારા support@example.com પર અથવા અમારી વેબસાઈટ પર લાઈવ ચેટ સુવિધા દ્વારા કરી શકો છો.',
                'answerHin' => 'आप हमारी ग्राहक सहायता टीम से ईमेल के माध्यम से support@example.com पर या हमारी वेबसाइट पर लाइव चैट सुविधा के जरिए संपर्क कर सकते हैं।',
                'status' => 'active'
            ],
            [
                'id' => '5',
                'question' => 'Do you ship internationally?',
                'questionGuj' => 'શું તમે આંતરરાષ્ટ્રીય શિપિંગ કરો છો?',
                'questionHin' => 'क्या आप अंतरराष्ट्रीय शिपिंग करते हैं?',
                'answer' => 'Yes, we offer international shipping to select countries. Shipping fees and delivery times vary depending on the destination.',
                'answerGuj' => 'હા, અમે પસંદ કરેલ દેશો માટે આંતરરાષ્ટ્રીય શિપિંગ પ્રદાન કરીએ છીએ. શિપિંગ ફી અને ડિલિવરીનો સમય ગંતવ્યના આધારે અલગ હોય છે.',
                'answerHin' => 'हाँ, हम चुनिंदा देशों के लिए अंतरराष्ट्रीय शिपिंग प्रदान करते हैं। शिपिंग शुल्क और डिलीवरी का समय गंतव्य के अनुसार भिन्न होता है।',
                'status' => 'active'
            ],
            [
                'id' => '6',
                'question' => 'How do I cancel my order?',
                'questionGuj' => 'હું મારો ઓર્ડર કેવી રીતે રદ કરી શકું?',
                'questionHin' => 'मैं अपना ऑर्डर कैसे रद्द कर सकता हूँ?',
                'answer' => 'Orders can be cancelled within 24 hours of placing them. Please contact our support team immediately to request a cancellation.',
                'answerGuj' => 'ઓર્ડર મૂક્યા બાદ 24 કલાકની અંદર રદ કરી શકાય છે. રદ કરવાની વિનંતી કરવા માટે કૃપા કરીને તુરંત અમારી સપોર્ટ ટીમનો સંપર્ક કરો.',
                'answerHin' => 'ऑर्डर देने के 24 घंटे के भीतर रद्द किए जा सकते हैं। रद्दीकरण का अनुरोध करने के लिए कृपया तुरंत हमारी सहायता टीम से संपर्क करें।',
                'status' => 'deactive'
            ]
        ]);
    }
}
