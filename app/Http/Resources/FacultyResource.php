<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacultyResource extends JsonResource
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
            'slug' => $this->slug,
            'lectures_count' => $this->lectures_count,
            'lectures_man' => $this->lectures_man,
            'lectures_woman' => $this->lectures_woman,
            'education_s2' => $this->education_s2,
            'education_s3' => $this->education_s3,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
