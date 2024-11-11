<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskCustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user =$this->user;
        return [
            "id"=> $user->id,
            "name"=> $user->name,
            "username"=>$user->username,
            "role"=>$user->role,
            "image"=> $user->image,
            "status"=>$user->status,
            "additional_phone"=>$user->additional_phone,
            'description'=>$this->description,
            'description_ru'=>$this->description_ru,
            'description_en'=>$this->description_en,
            'address'=>$this->target,
            'lat'=>$this->lat,
            'lon'=>$this->long,
        ];
    }
}
