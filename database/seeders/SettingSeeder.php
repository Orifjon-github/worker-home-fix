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
            'value' => 'fiit@info.com'
        ]);
        Setting::create([
            'key' => 'logo',
            'value' => 'uploads/logo.png'
        ]);
        Setting::create([
            'key' => 'address',
            'value' => 'Узбекистан, Ташкент, Алишар Навоий 27/4',
            'value_uz' => "O'zbekiston, Toshkent, Alishar Navoiy 27/4",
            'value_en' => 'Uzbekistan, Tashkent, Alishar Navoiy 27/4 (en)'
        ]);
        Setting::create([
            'key' => 'iframe',
            'value' => 'https://maps.app.goo.gl/YXsD8ADKmPqRfkJH8'
        ]);
        Setting::create([
            'key' => 'terms_partner',
            'value' => 'Textarea Html Content'
        ]);
//        Setting::create([
//            'key' => 'terms_partner_2',
//            'value' => 'Textarea Html Content 2'
//        ]);
        Setting::create([
            'key' => 'background_image_partner',
            'value' => 'uploads/example.png'
        ]);
        Setting::create([
            'key' => 'about_image',
            'value' => 'uploads/example.png'
        ]);
        Setting::create([
            'key' => 'about_short_description',
            'value' => 'Example Short Description'
        ]);
        Setting::create([
            'key' => 'about_description',
            'value' => 'Example Description'
        ]);
        Setting::create([
            'key' => 'about_video_image',
            'value' => 'uploads/example.mp4'
        ]);
        Setting::create([
            'key' => 'about_video',
            'value' => 'uploads/example.mp4'
        ]);
//        Setting::create([
//            'key' => 'result_video',
//            'value' => '/uploads/video'
//        ]);
//        Setting::create([
//            'key' => 'delivery_text',
//            'value' => 'Example Description Text'
//        ]);
        Setting::create([
            'key' => 'consultation_image',
            'value' => 'uploads/example.png'
        ]);
//        Setting::create([
//            'key' => 'consultation_description',
//            'value' => 'Example Description Text'
//        ]);
//        Setting::create([
//            'key' => 'consultation_job',
//            'value' => 'Specialist'
//        ]);
//        Setting::create([
//            'key' => 'consultation_name',
//            'value' => 'John Smith'
//        ]);
//        Setting::create([
//            'key' => 'productBg',
//            'value' => 'uploads/uploads'
//        ]);
        Setting::create([
            'key' => 'contactBg',
            'value' => 'uploads/example.png'
        ]);
        Setting::create([
            'key' => 'aboutBg',
            'value' => 'uploads/example.png'
        ]);
        Setting::create([
            'key' => 'blogBg',
            'value' => 'uploads/example.png'
        ]);
        Setting::create([
            'key' => 'galleryBg',
            'value' => 'uploads/example.png'
        ]);
//        Setting::create([
//            'key' => 'cartBg',
//            'value' => 'uploads/uploads'
//        ]);
//        Setting::create([
//            'key' => 'partnerBg',
//            'value' => 'uploads/uploads'
//        ]);
        Setting::create([
            'key' => 'advantageBg',
            'value' => 'uploads/example.png'
        ]);
//        Setting::create([
//            'key' => 'favoritesBg',
//            'value' => 'uploads/uploads'
//        ]);
    }
}
