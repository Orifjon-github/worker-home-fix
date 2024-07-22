<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $name
 * @property mixed $id
 * @property mixed $image
 * @property mixed $video_url
 * @property mixed $rate
 */
class TestimonialResource extends JsonResource
{
    use Helpers;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->getValue($this, 'description'),
            'image' => env('IMAGES_BASE_URL') . $this->image,
            'video_url' => $this->video_url,
            'rate' => $this->rate,
        ];
    }
}
