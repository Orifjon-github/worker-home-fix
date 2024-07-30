<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            BannerSeeder::class,
            PlanSeeder::class,
            ResultSeeder::class,
            WorkSeeder::class,
            AdvantageSeeder::class,
            ServiceSeeder::class,
            ServiceAdvantageSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            PartnerSeeder::class,
            SocialSeeder::class,
            PlanAdvantageSeeder::class,
            QuestionAnswerSeeder::class
        ]);
    }
}
