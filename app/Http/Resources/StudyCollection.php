<?php

namespace App\Http\Resources;

use App\Models\Study;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return StudyResource::collection($this->collection);
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
                'filters' => Study::toFilterableParams($request),

                /** the table header */
                'headers' => [
                    ['text' => 'Name', 'value' => 'name', 'sortable' => false],
                    ['text' => 'Student', 'value' => 'student_count', 'sortable' => false],
                    ['text' => 'Ratio', 'value' => 'lecture_ratio', 'sortable' => false],
                    ['text' => 'Lecture', 'value' => 'lectures_count', 'sortable' => false],
                    ['text' => 'L', 'value' => 'lectures_man', 'sortable' => false],
                    ['text' => 'P', 'value' => 'lectures_woman', 'sortable' => false],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime', 'sortable' => false],
                ],

                /** the record key */
                'key' => 'id',

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null,
                    'student_count' => 0,
                    'lecture_ratio' => 0,
                ],

                /** the page title */
                'title' => 'Untitled',
            ]
        ];
    }
}
