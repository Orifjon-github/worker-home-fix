<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResponce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $url = str_starts_with($this->image, '/storage/') ? env('APP_URL') : env('IMAGES_BASE_URL');
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'image' => $url . $this->image,
            'status'=>$this->status,
            'created_at'=>$this->created_at,
        ];
        return parent::toArray($request);
    }
}
