<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $price
 */
class ServiceAdvantageResource extends JsonResource
{
    use Helpers;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->getValue($this),
            'price' => $this->price
        ];
    }
}
