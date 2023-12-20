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
            'id' => $this->id,
            'name' => $language == 'ru' ? $this->name : ($this->name_uz ?? $this->name),
            'short_description' => $language == 'ru' ? $this->short_description : ($this->short_description_uz ?? $this->short_description),
            'description' => $language == 'ru' ? $this->description : $this->description_uz,
            'image' => env('IMAGES_BASE_URL') . $this->image ?? "",
            'count' => $this->count ?? 1,
            'totalCount' => $this->totalCount ?? 1,
            'compositions' => CompositionResource::collection($this->compositions) ?? [],
            'images' => ProductImageResource::collection($this->images) ?? [],
            'comments' => CommentResourceResource::collection($this->comments) ?? []
        ];
    }
}
