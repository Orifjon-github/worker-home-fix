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
            'title' => $language == 'ru' ? $this->title : ($this->title_uz ?? $this->title),
            'description' => $language == 'ru' ? $this->description : ($this->description_uz ?? $this->description),
            'image' => env('IMAGES_BASE_URL') . $this->image
        ];
    }
}