<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
            'id' => $this->id,
            'student_name' => $this->student->name,
            'status' => $this->status == 1 ? 'Not Answered' : 'Answered',
            'question' => $this->question,
            'comments' => $this->comments
        ];
    }
}
