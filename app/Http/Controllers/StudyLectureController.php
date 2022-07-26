<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\Faculty;
use App\Models\Lecture;
use Illuminate\Http\Request;
use App\Http\Resources\LectureCollection;
use App\Http\Resources\LectureShowResource;

class StudyLectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Faculty $faculty, Study $study)
    {
        return new LectureCollection(
            $study
                ->lectures()
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
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faculty $faculty, Study $study)
    {
        $this->validate($request, []);

        return Lecture::storeRecord($request, $study);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty, Study $study, Lecture $lecture)
    {
        return new LectureShowResource($lecture);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty,  Study $study, Lecture $lecture)
    {
        $this->validate($request, []);

        return Lecture::updateRecord($request, $lecture, $study);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study  $study
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faculty $faculty, Study $study, Lecture $lecture)
    {
        $this->validate($request, []);

        return Lecture::destroyRecord($lecture);
    }
}
