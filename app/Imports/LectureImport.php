<?php

namespace App\Imports;

use App\Models\Study;
use App\Models\Lecture;
use App\Models\Position;
use App\Models\University;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LectureImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $study = Study::firstWhere('slug', str($row['prodi'])->slug());

            if (!$study) {
                dd($row);
                continue;
            }

            $position = Position::firstWhere('slug', str($row['position'])->slug());

            if ($row['campuz'] && $row['campuz'] !== '') {
                $university = University::firstWhere('maps', 'ilike', "%" . $row['campuz'] . "%");
            } else {
                $university = null;
            }

            $model = new Lecture();
            $model->nik = $row['nik'];
            $model->nidn = $row['nidn'];
            $model->name = $row['name'];
            $model->slug = str($row['name'] . ' ' . $row['prodi'] . ' ' . $row['position'])->slug();
            $model->degree_fr = $row['degree_fr'];
            $model->degree_bc = $row['degree_bc'];
            $model->gender = $row['gender'];
            $model->born_place = $row['born_place'];
            $model->born_date = Date::excelToDateTimeObject($row['born_date']);
            $model->position_id = optional($position)->id;
            $model->faculty_id = optional($study)->faculty_id;
            $model->study_id = optional($study)->id;
            $model->education_lv = $row['education'];
            $model->university_id = optional($university)->id;
            $model->sk_number = $row['bph_number'];
            $model->sk_date = Date::excelToDateTimeObject($row['bph_tmt']);
            $model->certi_regist = $row['certi_regist'];
            $model->certi_number = $row['certi_number'];
            $model->save();
        }
    }
}
