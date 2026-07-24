<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text_en' => $this->text_en,
            'type' => $this->type,
            'options' => $this->options,
        ];
    }
}
