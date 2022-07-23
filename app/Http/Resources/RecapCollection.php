<?php

namespace App\Http\Resources;

use App\Models\Recap;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecapCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return RecapResource::collection($this->collection);
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
                'filters' => Recap::toFilterableParams($request),

                /** the table header */
                'headers' => [
                    ['text' => 'Name', 'value' => 'name', 'sortable' => false],
                    ['text' => 'Periode', 'value' => 'slug', 'sortable' => false],
                    ['text' => 'Student', 'value' => 'student_count', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'Rasio', 'value' => 'lecture_ratio', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'Need', 'value' => 'lecture_need', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'Exists', 'value' => 'lecture_count', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'Advg', 'value' => 'lecture_advg', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'Lack', 'value' => 'lecture_lack', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'S2', 'value' => 's2_count', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'S3', 'value' => 's3_count', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'TP', 'value' => 'position_tp', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'AA', 'value' => 'position_aa', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'LR', 'value' => 'position_lr', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'LK', 'value' => 'position_lk', 'sortable' => false, 'align' => 'center'],
                    ['text' => 'GB', 'value' => 'position_gb', 'sortable' => false, 'align' => 'center'],
                ],

                /** the record key */
                'key' => 'id',

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null,
                ],

                /** the page title */
                'title' => 'Untitled',
            ]
        ];
    }
}
