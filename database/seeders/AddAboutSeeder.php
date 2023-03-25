<?php

namespace Database\Seeders;

use App\Models\HomeSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeSection::query()->truncate();
        for ($i=0; $i<3; $i++){
            HomeSection::query()->create([
                'title' => [
                    'ar' => 'عنوان1',
                    'en' => 'Address2',
                ],
                'description' => [
                    'ar' => 'حلول إلكترونية لخدمات أسهل
الآن امنح عملائك فرصة عيش تجربة إلكترونية رائعة من خلال استعراضهم المنيو الذكي وتحديد خياراتهم وإكمال الطلب والدفع بخطوات إلكترونية متكاملة

عزز مبيعاتك وأسعد عملائك مع ديجتال فود',
                    'en' => 'Electronic solutions for easier services
Now give your customers the opportunity to live a wonderful electronic experience by browsing the smart menu, selecting their options, completing the order and paying with integrated electronic steps

Boost your sales and delight your customers with Digital Food',
                ],
                'type' => 'about'
            ]);
        }
    }
}
