<?php

namespace App\Http\Resources;

use App\Models\Lecture;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LectureCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return LectureResource::collection($this->collection);
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function with($request)
    {
        if (!$request->has('initialized')) {
            return [];
        }

        return [
            'setups' => [
                /** the page combo */
                'combos' => [],

                /** the page enable fitur */
                'features' => [
                    'create' => false,
                    'show' => false,
                    'export' => false,
                    'import' => false,
                    'print' => false,
                    'search' => false,
                    'trashed' => false,
                ],

                /** the page data filter */
                'filters' => Lecture::toFilterableParams($request),

                /** the table header */
                'headers' => [
                    ['text' => 'Fullname', 'value' => 'fullname', 'sortable' => false],
                    ['text' => 'Gender', 'value' => 'gender', 'sortable' => false],
                    ['text' => 'Edu', 'value' => 'education_lv', 'sortable' => false],
                    ['text' => 'NIK', 'value' => 'nik', 'sortable' => false],
                    ['text' => 'NIDN', 'value' => 'nidn', 'sortable' => false],
                    ['text' => 'Born Place', 'value' => 'born_place', 'sortable' => false],
                    ['text' => 'Born Date', 'value' => 'born_date', 'sortable' => false],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime', 'sortable' => false],
                ],

                /** the record key */
                'key' => 'id',

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'nik' => null,
                    'name' => null,
                    'slug' => null,
                    'degree_fr' => null,
                    'degree_bc' => null,
                    'gender' => null,
                    'born_place' => null,
                    'born_date' => null,
                    'position_id' => null,
                    'education_lv' => null,
                    'education_cp' => null,
                    'sk_number' => null,
                    'sk_date' => null,
                    'scholarship_id' => null,
                    'scholarship_st' => null,
                    'scholarship_fn' => null,
                    'certi_regist' => null,
                    'certi_number' => null,
                    'certi_date' => null,
                    'functional_date' => null,
                    'inffasing_date' => null,
                ],

                /** the page title */
                'title' => 'Untitled',
            ]
        ];
    }
}
