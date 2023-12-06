<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class PartnerResource extends JsonResource
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
            'id' => $this->id,
            'name' => $language == 'ru' ? $this->name : ($this->name ?? $this->name),
            'link' => $language == 'ru' ? $this->link : ($this->link ?? $this->link),
            'icon' => $language == 'ru' ? $this->icon : ($this->icon ?? $this->icon)
        ];
    }
}
