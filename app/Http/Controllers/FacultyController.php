<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Resources\FacultyCollection;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\FacultyShowResource;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new FacultyCollection(
            Faculty::withCount([
                'lectures',
                'lectures as lectures_man' => function (Builder $query) {
                    $query->where('gender', 'L');
                },
                'lectures as lectures_woman' => function (Builder $query) {
                    $query->where('gender', 'P');
                },
                'lectures as education_s2' => function (Builder $query) {
                    $query->where('education_lv', 'S2');
                },
                'lectures as education_s3' => function (Builder $query) {
                    $query->where('education_lv', 'S3');
                },
            ])
                ->filter($request->filters)
                ->search($request->findBy)
                ->sortBy($request->sortBy, $request->sortDesc)
                ->paginate($request->itemsPerPage)
                ->appends([
                    'sortBy' => $request->sortBy,
                    'sortDesc' => $request->sortDesc,
                    'findBy' => $request->findBy,
                    'findOn' => $request->findOn,
                    'filters' => $request->filters,
                ])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, []);

        return Faculty::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        return new FacultyShowResource($faculty);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $this->validate($request, []);

        return Faculty::updateRecord($request, $faculty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faculty $faculty)
    {
        $this->validate($request, []);

        return Faculty::destroyRecord($faculty);
    }
}
