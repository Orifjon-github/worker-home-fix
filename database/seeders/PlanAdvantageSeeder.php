<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanAdvantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanAdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = Plan::all();
        foreach ($plans as $plan) {
            for ($i = 0; $i < 10; $i++)
            PlanAdvantage::create([
                'plan_id' => $plan->id,
                'title' => $plan->type . ' Plan Service' . $i,
                'price' => $plan->amount / 10
            ]);
        }
    }
}
