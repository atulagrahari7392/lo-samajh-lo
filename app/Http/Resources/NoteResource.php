<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title_en' => $this->title_en,
            'file_url' => $this->file_url,
            'is_free' => $this->is_free,
        ];
    }
}
