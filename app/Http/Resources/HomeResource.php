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
        switch ($language) {
            case 'ru':
                $image = $this->image;
                $title = $this->title;
                break;
            case 'uz':
                $image = $this->image_uz ?? $this->image;
                $title = $this->title_uz ?? $this->title;
                break;
            case 'en':
                $image = $this->image_en ?? $this->image;
                $title = $this->title_en ?? $this->title;
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'image' => env('IMAGES_BASE_URL') . $image,
        ];
    }
}
