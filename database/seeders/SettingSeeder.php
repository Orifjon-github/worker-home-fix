<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'email',
            'value' => 'home-fix@info.com'
        ]);
        Setting::create([
            'type' => 'image',
            'key' => 'logo',
            'value' => 'uploads/logo.png'
        ]);
        Setting::create([
            'type' => 'image',
            'key' => 'favicon',
            'value' => 'uploads/logo.png'
        ]);
        Setting::create([
            'key' => 'main_phone',
            'value' => '+998908319755'
        ]);
        Setting::create([
            'key' => 'additional_phone',
            'value' => '+998908319755'
        ]);
        Setting::create([
            'key' => 'address',
            'value' => 'Test Address'
        ]);
        Setting::create([
            'key' => 'working_hours',
            'value' => 'Test Working Hours'
        ]);
        Setting::create([
            'type' => 'html',
            'key' => 'services_texts',
            'value' => 'services_texts'
        ]);
        Setting::create([
            'type' => 'html',
            'key' => 'contact_us_texts',
            'value' => 'contact_us_texts'
        ]);
        Setting::create([
            'type' => 'html',
            'key' => 'career_texts',
            'value' => 'career_texts'
        ]);
        Setting::create([
            'type' => 'html',
            'key' => 'faqs_texts',
            'value' => 'faqs_texts'
        ]);
        Setting::create([
            'type' => 'html',
            'key' => 'reviews_texts',
            'value' => 'reviews_texts'
        ]);
        Setting::create([
            'type' => 'html',
            'key' => 'membership_plan',
            'value' => 'membership_plan'
        ]);
        Setting::create([
            'type' => 'html',
            'key' => 'about_description',
            'value' => 'about_description'
        ]);
        Setting::create([
            'type' => 'image',
            'key' => 'about_video_bg',
            'value' => 'about_video_bg'
        ]);
        Setting::create([
            'key' => 'about_video_url',
            'value' => 'about_video_url'
        ]);
        Setting::create([
            'key' => 'location',
            'value' => 'https://yandex.com/map-widget/v1/?um=constructor%3Ab2ac1ad9d8883a4b904248b72cd0e4bc088f6b9d78c1c9e455df3904a8b40be1&amp;source=constructor'
        ]);
        $pages = ['home', 'membership', 'reviews', 'faqs', 'career', 'contact', 'services', 'about'];
        foreach ($pages as $page) {
            foreach (['title', 'description', 'keyword'] as $attribute) {
                Setting::create([
                    'key' => 'seo_' . $page . '_' . $attribute,
                    'value' => 'seo_' . $page . '_' . $attribute
            ]);
            }
        }
    }
}
