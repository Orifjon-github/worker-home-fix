<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phone::create([
            'place' => 'Header',
            'number' => '+998777777777'
        ]);

        Phone::create([
            'place' => 'Footer',
            'number' => '(77) 777-77-77'
        ]);

    }
}
