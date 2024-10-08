<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Elbek',
            'email' => 'elbek@gmail.com',
            'password' => Hash::make('secret'),
        ]);
        User::create([
            'name' => 'Orifjon',
            'email' => 'orifjon@gmail.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
