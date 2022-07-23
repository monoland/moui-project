<?php

namespace App\Imports;

use App\Models\University;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UniversityImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $model = new University();
            $model->name = $row['name'];
            $model->slug = str($row['name'])->slug();
            $model->maps = $row['maps'];
            $model->save();
        }
    }
}
