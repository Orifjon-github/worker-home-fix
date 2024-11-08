<?php

namespace App\Http\Resources\Task;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'task' => parent::toArray($request),
            'materials' => $this->materials ? $this->materials->where('type', 1)->values() : [],
            'images' => ImageResource::collection($this->images),
            'works' => $this->works,
            'equipments' =>$this->materials ? $this->materials->where('type', 2)->values() : [],
        ];
    }
}
