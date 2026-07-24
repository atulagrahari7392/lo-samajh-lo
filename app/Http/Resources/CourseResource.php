<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title_en' => $this->title_en,
            'title_hi' => $this->title_hi,
            'price' => $this->price,
            'thumbnail' => $this->thumbnail,
        ];
    }
}
