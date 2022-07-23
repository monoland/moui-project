<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Resources\StudyCollection;
use App\Http\Resources\StudyShowResource;
use Illuminate\Database\Eloquent\Builder;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Faculty $faculty)
    {
        return new StudyCollection(
            $faculty
                ->studies()
                ->withCount([
                    'lectures',
                    'lectures as lectures_man' => function (Builder $query) {
                        $query->where('gender', 'L');
                    },
                    'lectures as lectures_woman' => function (Builder $query) {
                        $query->where('gender', 'P');
                    }
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
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faculty $faculty)
    {
        $this->validate($request, []);

        return Study::storeRecord($request, $faculty);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty, Study $study)
    {
        return new StudyShowResource($study);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty, Study $study)
    {
        $this->validate($request, []);

        return Study::updateRecord($request, $study);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faculty $faculty, Study $study)
    {
        $this->validate($request, []);

        return Study::destroyRecord($study);
    }
}
