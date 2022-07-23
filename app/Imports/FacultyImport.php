<?php

namespace App\Imports;

use App\Models\Faculty;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FacultyImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $model = new Faculty();
            $model->name = $row['name'];
            $model->slug = $row['slug'];
            $model->save();
        }
    }
}
