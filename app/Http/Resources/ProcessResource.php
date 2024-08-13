<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $link
 */
class ProcessResource extends JsonResource
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
            'image' => $this->getValue($this, 'image'),
            'link' => $this->link
        ];
    }
}
