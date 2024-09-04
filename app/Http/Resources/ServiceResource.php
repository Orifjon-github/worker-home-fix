<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $advantages
 * @property mixed $image
 * @property mixed $icon
 */
class ServiceResource extends JsonResource
{
   use Helpers;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->getValue($this),
            'image' => env('IMAGES_BASE_URL') .$this->image,
            'icon' => env('IMAGES_BASE_URL') .$this->icon,
        ];
    }
}
