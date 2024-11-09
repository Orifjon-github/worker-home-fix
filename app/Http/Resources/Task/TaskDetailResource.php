<?php

namespace App\Http\Resources\Task;

use App\Http\Resources\ImageResource;
use App\Models\User;
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
            'materials' => optional($this->materials)->where('type', 1)->values() ?? [],
            'images' => $this->homequipment ? new ImageResource($this->homequipment) : null,
            'works' => $this->works,
            'equipments' => optional($this->materials)->where('type', 2)->values() ?? [],
            'customer'=>$this->homequipment->home->user,
        ];
    }
}
