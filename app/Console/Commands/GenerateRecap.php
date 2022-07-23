<?php

namespace App\Console\Commands;

use App\Models\Recap;
use App\Models\Study;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class GenerateRecap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moui:generate-recap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate data-recap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $periode = now()->format('Y-m');

        $studies = Study::withCount([
            'lectures',

            // education
            'lectures as s2_count' => function (Builder $query) {
                $query->where('education_lv', 'S2');
            },
            'lectures as s3_count' => function (Builder $query) {
                $query->where('education_lv', 'S3');
            },

            // position
            'lectures as position_tp' => function (Builder $query) {
                $query->where('position_id', 1);
            },
            'lectures as position_aa' => function (Builder $query) {
                $query->where('position_id', 2);
            },
            'lectures as position_lr' => function (Builder $query) {
                $query->where('position_id', 3);
            },
            'lectures as position_lk' => function (Builder $query) {
                $query->where('position_id', 4);
            },
            'lectures as position_gb' => function (Builder $query) {
                $query->where('position_id', 5);
            },

            // certified
            'lectures as certified_count' => function (Builder $query) {
                $query->whereNotNull('certi_regist');
            },
            'lectures as uncertified_count' => function (Builder $query) {
                $query->whereNull('certi_regist');
            },

            // scholarship
            'lectures as scholarship_count' => function (Builder $query) {
                $query->whereNotNull('scholarship_id');
            },
        ])->get();

        foreach ($studies as $study) {
            $model = Recap::where('faculty_id', $study->faculty_id)
                ->where('study_id', $study->id)
                ->where('slug', $periode)
                ->first();

            if (!$model) {
                $model = new Recap();
            }

            $lecture_need = intval(ceil($study->student_count / $study->lecture_ratio));
            $lecture_advg = $study->lectures_count > $lecture_need ? intval(ceil($study->lectures_count - $lecture_need)) : 0;
            $lecture_lack = $study->lectures_count > $lecture_need ? 0 : intval(ceil($lecture_need - $study->lectures_count));
            $existing_ratio = $study->student_count > 0 ? intval(ceil($study->student_count / $study->lectures_count)) : 0;

            $model->name = $study->name;
            $model->slug = $periode;
            $model->faculty_id = $study->faculty_id;
            $model->study_id = $study->id;
            $model->student_count = $study->student_count;
            $model->lecture_ratio = $study->lecture_ratio;
            $model->lecture_need = $lecture_need;
            $model->lecture_count = $study->lectures_count;
            $model->lecture_advg = $lecture_advg;
            $model->lecture_lack = $lecture_lack;
            $model->existing_ratio = $existing_ratio;
            $model->s2_count = $study->s2_count;
            $model->s3_count = $study->s3_count;
            $model->certified_count = $study->certified_count;
            $model->uncertified_count = $study->uncertified_count;
            $model->scholarship_count = $study->scholarship_count;
            $model->position_tp = $study->position_tp;
            $model->position_aa = $study->position_aa;
            $model->position_lr = $study->position_lr;
            $model->position_lk = $study->position_lk;
            $model->position_gb = $study->position_gb;
            $model->save();
        }
    }
}
