<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudyResource extends JsonResource
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
            'name' => $this->name,
            'student_count' => $this->student_count,
            'lecture_ratio' => $this->lecture_ratio,
            'lectures_count' => $this->lectures_count,
            'lectures_man' => $this->lectures_man,
            'lectures_woman' => $this->lectures_woman,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
