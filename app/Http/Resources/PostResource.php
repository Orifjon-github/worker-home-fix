<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class PostResource extends JsonResource
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
            'short_description' => ($language == "ru") ? $this->short_description : (($language == "uz") ? ($this->short_description_uz ?? $this->short_description) : ($this->short_description_en ?? $this->short_description)),
            'description' => ($language == "ru") ? $this->description : (($language == "uz") ? ($this->description_uz ?? $this->description) : ($this->description_en ?? $this->description)),
            'image' => env('IMAGES_BASE_URL') . $this->image
        ];
    }
}
