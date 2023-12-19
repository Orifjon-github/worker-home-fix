<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class CommentResourceResource extends JsonResource
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
            'author' => $this->author,
            'phone' => $this->phone,
            'image' => str_starts_with($this->image, 'uploads/') ? env('IMAGES_BASE_URL') . $this->image : $this->image,
            'video' => str_starts_with($this->video, 'uploads/') ? env('IMAGES_BASE_URL') . $this->video : $this->video,
            'description' => $language == 'ru' ? $this->description : ($this->description_uz ?? $this->description)
        ];
    }
}
