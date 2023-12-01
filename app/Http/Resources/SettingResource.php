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
        return [
            $this->key => $language == 'ru' ? $this->value : ($this->value_uz ?? $this->value),
            'enable' => $this->enable
        ];
    }
}
