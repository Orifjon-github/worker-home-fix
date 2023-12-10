<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ProductResource extends JsonResource
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
            'name' => $language == 'ru' ? $this->name : ($this->name_uz ?? $this->name),
            'description' => $language == 'ru' ? $this->description : ($this->description_uz ?? $this->description),
            'image' => env('IMAGES_BASE_URL') . $this->image,
            'count' => $this->count,
            'totalCount' => $this->totalCount,
        ];
    }
}
