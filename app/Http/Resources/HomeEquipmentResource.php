<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $model
 * @property mixed $brand
 * @property mixed $description
 * @property mixed $image
 * @property mixed $fix_date
 */
class HomeEquipmentResource extends JsonResource
{
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
            'model' => $this->model,
            'brand' => $this->brand,
            'description' => $this->description,
            'image' => $this->image ? env('APP_URL') . $this->image : null,
            'fix_date' => $this->fix_date,
        ];
    }
}
