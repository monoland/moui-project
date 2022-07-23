<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudyShowResource extends JsonResource
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
            'features' => [
                'delete' => false,
                'destroy' => false,
                'print' => false,
                'restore' => false,
                'update' => false,
            ],

            'links' => [],
            'record' => new StudyResource($this),
            'setups' => [],
        ];
    }
}
