<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Result::create([
           'name' => 'Partners',
           'count' => '20+'
        ]);
        Result::create([
            'name' => 'Happy Clients',
            'count' => '100'
        ]);
        Result::create([
            'name' => 'Professional Employees',
            'count' => '10+'
        ]);
        Result::create([
            'name' => 'Services',
            'count' => '100+'
        ]);
    }
}
