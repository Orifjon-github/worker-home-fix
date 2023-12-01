<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AboutImage;
use App\Models\Capability;
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
            SocialSeeder::class,
            FaqSeeder::class,
            PartnerSeeder::class,
            PostSeeder::class,
            ProductSeeder::class,
            CommentSeeder::class,
            ResultSeeder::class,
            SertificateSeeder::class,
            TestimonialSeeder::class,
            PhoneSeeder::class,
            HomeSeeder::class,
            CommentSeeder::class,
            AboutImageSeeder::class,
            CapabilitySeeder::class
        ]);
    }
}
