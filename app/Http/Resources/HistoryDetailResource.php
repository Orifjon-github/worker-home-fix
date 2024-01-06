<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class HistoryDetailResource extends JsonResource
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
            'years' => $this->years,
            'title' => ($language == "ru") ? $this->title : (($language == "uz") ? ($this->title_uz ?? $this->title) : ($this->title_en ?? $this->title)),
            'description' => ($language == "ru") ? $this->description : (($language == "uz") ? ($this->description_uz ?? $this->description) : ($this->description_en ?? $this->description)),
            'images' => PostImageResource::collection($this->images) ?? [],
        ];
    }
}
