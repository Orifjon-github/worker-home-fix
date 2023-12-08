<?php

namespace Database\Seeders;

use App\Models\Sertificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sertificate::create([
           'image' => 'path/image.png'
        ]);
        Sertificate::create([
            'image' => 'path/image.png'
        ]);
        Sertificate::create([
            'image' => 'path/image.png'
        ]);
        Sertificate::create([
            'image' => 'path/image.png'
        ]);
    }
}
