<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $language = App::getLocale();

        // Assuming $this->resource is a collection of Setting models
        $settings = $this->resource->mapWithKeys(function ($setting) use ($language) {
            return [
                $setting->key => $language == 'ru' ? $setting->value : ($setting->value_uz ?? $setting->value),
            ];
        });

        return $settings->all();
    }
}
