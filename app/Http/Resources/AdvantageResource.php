<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/**
 * @property mixed $icon
 * @property mixed $id
 */
class AdvantageResource extends JsonResource
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
            'title' => $this->getValue($this),
            'description' => $this->getValue($this, 'description'),
            'icon' => env('IMAGES_BASE_URL') . $this->icon
        ];
    }
}
