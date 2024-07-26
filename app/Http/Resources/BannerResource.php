<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $image
 */
class BannerResource extends JsonResource
{
    use Helpers;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->getValue($this),
            'description' => $this->getValue($this, 'description'),
            'image' => env('IMAGES_BASE_URL') . $this->image,
        ];
    }
}
