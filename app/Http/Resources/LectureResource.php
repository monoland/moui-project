<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
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
            'nik' => $this->nik,
            'nidn' => $this->nidn,
            'name' => $this->name,
            'fullname' => $this->fullname,
            'slug' => $this->slug,
            'degree_fr' => $this->degree_fr,
            'degree_bc' => $this->degree_bc,
            'gender' => $this->gender,
            'born_place' => $this->born_place,
            'born_date' => $this->born_date,
            'position_id' => $this->position_id,
            'study_id' => $this->study_id,
            'education_lv' => $this->education_lv,
            'education_cp' => $this->education_cp,
            'sk_number' => $this->sk_number,
            'sk_date' => $this->sk_date,
            'scholarship_id' => $this->scholarship_id,
            'scholarship_st' => $this->scholarship_st,
            'scholarship_fn' => $this->scholarship_fn,
            'certi_regist' => $this->certi_regist,
            'certi_number' => $this->certi_number,
            'certi_date' => $this->certi_date,
            'functional_date' => $this->functional_date,
            'inffasing_date' => $this->inffasing_date,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
