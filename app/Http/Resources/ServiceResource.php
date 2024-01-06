<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ServiceResource extends JsonResource
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
            'title' => ($language == "ru") ? $this->title : (($language == "uz") ? ($this->title_uz ?? $this->title) : ($this->title_en ?? $this->title)),
            'image' => env('IMAGES_BASE_URL') .$this->image
        ];
    }
}
