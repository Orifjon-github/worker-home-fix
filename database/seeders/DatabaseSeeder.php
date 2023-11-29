<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            AdvantageSeeder::class,
            CommentSeeder::class,
            SocialSeeder::class,
            FaqSeeder::class,
            PartnerSeeder::class,
            PostSeeder::class,
            ProductSeeder::class,
            ResultSeeder::class,
            SertificateSeeder::class,
            TestimonialSeeder::class,
            PhoneSeeder::class,
            HomeSeeder::class
        ]);
    }
}
