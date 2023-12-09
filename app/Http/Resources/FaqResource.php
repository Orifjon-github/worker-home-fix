<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class FaqResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $language = App::getLocale();
        return [
            'id' => $this->id,
            'question' => $language == 'ru' ? $this->question : ($this->question_uz ?? $this->question),
            'answer' => $language == 'ru' ? $this->answer : ($this->answer_uz ?? $this->answer)
        ];
    }
}
