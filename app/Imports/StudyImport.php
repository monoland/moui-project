<?php

namespace App\Imports;

use App\Models\Study;
use App\Models\Faculty;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudyImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $parent = Faculty::firstWhere('slug', $row['faculty']);

            if (!$parent) {
                continue;
            }

            $model = new Study();
            $model->name = $row['name'];
            $model->slug = str($row['name'])->slug();
            $model->student_count = $row['student'];
            $model->lecture_ratio = $row['ratio'];

            $parent->studies()->save($model);
        }
    }
}
