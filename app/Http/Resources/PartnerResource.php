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
            'name' => $this->name, //($language == "ru") ? $this->name : (($language == "uz") ? ($this->name_uz ?? $this->name) : ($this->name_en ?? $this->name)),
            'link' => ($language == "ru") ? $this->link : (($language == "uz") ? ($this->link_uz ?? $this->link) : ($this->link_en ?? $this->link)),
            'icon' => env('IMAGES_BASE_URL') . (($language == "ru") ? $this->icon : (${"this->icon_".$language} ?? $this->icon)),
        ];
    }
}
