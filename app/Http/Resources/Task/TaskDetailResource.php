<?php

namespace App\Http\Resources\Task;

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
        return[
            'task'=> parent::toArray($request),
            'materials'=>$this->materials ,
            'images'=>$this->images,
            'works'=>$this->works,
            'equipments'=>$this->equipments,
        ];
    }
}
