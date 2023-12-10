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
        $settings = $this->resource->mapWithKeys(function ($setting) use ($baseUrl, $language) {
            $is_file = str_starts_with($setting->value, 'uploads/');
            $value = $language == 'ru' ? $setting->value : ($setting->value_uz ?? $setting->value);
            return [
                $setting->key => $is_file ? env('IMAGES_BASE_URL') . $value : $value,
            ];
        });

        return $settings->all();
    }
}
