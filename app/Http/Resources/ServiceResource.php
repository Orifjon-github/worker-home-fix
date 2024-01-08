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
        $title = match ($language) {'ru' => $this->title, 'uz' => $this->title_uz ?? $this->title, 'en' => $this->title_en ?? $this->title};
        $description = match ($language) {'ru' => $this->description, 'uz' => $this->description_uz ?? $this->description, 'en' => $this->description_en ?? $this->description};
        return [
            'id' => $this->id,
            'title' => $title,
            'description' => $description,
            'image' => env('IMAGES_BASE_URL') .$this->image
        ];
    }
}
