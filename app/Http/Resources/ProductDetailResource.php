<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ProductDetailResource extends JsonResource
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
            'name' => $language == 'ru' ? $this->name : ($this->name_uz ?? $this->name),
            'description' => $language == 'ru' ? $this->description : $this->description_uz,
            'image' => $this->image ?? "",
            'compositions' => CompositionResource::collection($this->compositions) ?? [],
            'images' => $this->images ?? [],
            'comments' => CommentResourceResource::collection($this->comments) ?? []
        ];
    }
}
