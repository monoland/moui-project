<?php

namespace App\Imports;

use App\Models\Position;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PositionImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $model = new Position();
            $model->name = $row['name'];
            $model->slug = str($row['name'])->slug();
            $model->save();
        }
    }
}
