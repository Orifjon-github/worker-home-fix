<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $url = str_starts_with($this->image, '/storage/') ? env('APP_URL') : env('IMAGES_BASE_URL');

        return [
            'id' => $this->id,
            'task_id' => $this->task_id,
            'image' => $url . $this->image,  // Concatenate the base URL with the image path
            'state' => $this->state
        ];

    }
}
