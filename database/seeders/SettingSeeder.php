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
            'value' => 'ipar@info.com'
        ]);
        Setting::create([
            'key' => 'logo',
            'value' => '/storage/logo/logo.png'
        ]);
        Setting::create([
            'key' => 'address',
            'value' => 'Узбекистан, Ташкент, Алишар Навоий 27/4',
            'value_uz' => 'Uzbekistan, Tashkent, Alishar Navoiy 27/4'
        ]);
        Setting::create([
            'key' => 'iframe',
            'value' => 'https://maps.app.goo.gl/YXsD8ADKmPqRfkJH8'
        ]);
        Setting::create([
            'key' => 'terms_partner_1',
            'value' => 'Textarea Html Content 1'
        ]);
        Setting::create([
            'key' => 'terms_partner_2',
            'value' => 'Textarea Html Content 2'
        ]);
        Setting::create([
            'key' => 'background_image_partner',
            'value' => 'path/image-background-partner.png'
        ]);
        Setting::create([
            'key' => 'about_image',
            'value' => 'path/image.png'
        ]);
        Setting::create([
            'key' => 'about_description',
            'value' => 'Example Description'
        ]);
        Setting::create([
            'key' => 'result_video',
            'value' => '/path/video'
        ]);
        Setting::create([
            'key' => 'delivery_text',
            'value' => 'Example Description Text'
        ]);
        Setting::create([
            'key' => 'consultation_image',
            'value' => 'image/path'
        ]);
        Setting::create([
            'key' => 'consultation_description',
            'value' => 'Example Description Text'
        ]);
        Setting::create([
            'key' => 'consultation_job',
            'value' => 'Specialist'
        ]);
        Setting::create([
            'key' => 'consultation_name',
            'value' => 'John Smith'
        ]);
    }
}
