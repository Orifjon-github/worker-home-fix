<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['individual', 'corporate'] as $type) {
            foreach (['one time', '1', '3', '6', '12'] as $duration) {
                if ($type == 'individual') {
                    $amount = !is_numeric($duration) ? 500000 : (int)$duration * 1000000;
                } else {
                    $amount = !is_numeric($duration) ? 1000000 : (int)$duration * 2000000;
                }
                Plan::create([
                    'type' => $type,
                    'duration' => $duration,
                    'amount' => $amount
                ]);
            }
        }

    }
}
