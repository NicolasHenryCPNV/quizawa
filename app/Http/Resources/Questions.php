<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Questions extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'image' => $this->image,
            'quizz_id' => $this->quizz_id,
        ];
    }
}
