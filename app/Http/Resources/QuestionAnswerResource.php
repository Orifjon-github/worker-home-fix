<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $button_url
 */
class QuestionAnswerResource extends JsonResource
{
    use Helpers;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'question' => $this->getValue($this, 'question'),
            'answer' => $this->getValue($this, 'answer'),
            'button_text' => $this->getValue($this, 'button_text'),
            'button_url' => $this->button_url
        ];
    }
}
