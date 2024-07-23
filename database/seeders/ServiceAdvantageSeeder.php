<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceAdvantage;
use Illuminate\Database\Seeder;

class ServiceAdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = Service::all();

        foreach ($services as $service) {
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Replace bathroom ventilation fan'
            ]);
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Installing ceiling fan'
            ]);
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Replacing a light fixture'
            ]);
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Changing smoke detector batteries'
            ]);
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Replace non-working outlets and plugs'
            ]);
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Changing light bulbs'
            ]);
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Replace florescent lights with LEDs'
            ]);
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Smart home automation'
            ]);
            ServiceAdvantage::create([
                'service_id' => $service->id,
                'title' => 'Plus lots more! No job is too small'
            ]);
        }
    }
}
