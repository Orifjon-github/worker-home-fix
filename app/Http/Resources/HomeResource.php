<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class HomeResource extends JsonResource
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
//            'description' => ($language == "ru") ? $this->description_en : (($language == "uz") ? ($this->name_uz ?? $this->description) : ($this->description_en ?? $this->description)),
            'image' => env('IMAGES_BASE_URL') . ($language == "ru") ? $this->image : (($language == "uz") ? ($this->image_uz ?? $this->image) : ($this->image_en ?? $this->image)),
        ];
    }
}
