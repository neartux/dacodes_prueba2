<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "lesson_id" => $this->lesson_id,
            "answer_type_id" => $this->answer_type_id,
            "name" => $this->name,
            "points" => $this->points,
            "answers" => $this->answersQuestion
        ];
    }
}
