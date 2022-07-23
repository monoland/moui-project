<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecapResource extends JsonResource
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
            'name' => optional($this->faculty)->slug . ' - ' . $this->name,
            'slug' => $this->slug,
            'student_count' => $this->student_count,
            'lecture_ratio' => '1:' . $this->lecture_ratio,
            'lecture_need' => $this->lecture_need,
            'lecture_count' => $this->lecture_count,
            'lecture_advg' => $this->lecture_advg,
            'lecture_lack' => $this->lecture_lack,
            's2_count' => $this->s2_count,
            's3_count' => $this->s3_count,
            'certified_count' => $this->certified_count,
            'uncertified_count' => $this->uncertified_count,
            'position_tp' => $this->position_tp,
            'position_aa' => $this->position_aa,
            'position_lr' => $this->position_lr,
            'position_lk' => $this->position_lk,
            'position_gb' => $this->position_gb,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
