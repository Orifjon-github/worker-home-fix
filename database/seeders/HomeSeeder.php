<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::create([
            'title' => 'Научное наследие традиционной уйгурской медицины с новыми достижениями',
            'title_uz' => "Yangi yutuqlar bilan an`anaviy uyg`ur tabobatining ilmiy merosi",
            'description' => 'Представитель международной ассоциации «IPAR», действующей по всему Узбекистану, биотехнологически развивающейся многопрофильной компании, соединяющей наследие традиционной уйгурской медицины с новыми достижениями науки.',
            'description_uz' => "O`zbekiston bo`ylab faoliyat yurituvchi “IPAR” xalqaro assotsiatsiyasi vakili, anʼanaviy uyg`ur tibbiyoti merosini yangi ilmiy yutuqlar bilan uyg`unlashtirgan biotexnologik jihatdan rivojlanayotgan diversifikatsiyalangan kompaniya.",
            'image' => '/storage/carousels/home1.png',
            'image_uz' => '/storage/carousels/home1_uz.png'
        ]);
    }
}
