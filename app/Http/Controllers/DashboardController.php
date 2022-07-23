<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $positions = Position::withCount([
            'lectures',
            'lectures as education_s2' => function (Builder $query) {
                $query->where('education_lv', 'S2');
            },
            'lectures as education_s3' => function (Builder $query) {
                $query->where('education_lv', 'S3');
            },
        ])->get();

        return response()->json([
            'positions' => $positions->map(function ($position) {
                return ['name' => $position->name, 'count' => $position->lectures_count];
            }),

            'education_s2' => $positions->reduce(function ($count, $position) {
                return $count + $position->education_s2;
            }, 0),

            'education_s3' => $positions->reduce(function ($count, $position) {
                return $count + $position->education_s3;
            }, 0),
        ]);
    }
}
