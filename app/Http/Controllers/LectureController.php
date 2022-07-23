<?php

namespace App\Http\Controllers;

use App\Http\Resources\LectureCollection;
use App\Http\Resources\LectureShowResource;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new LectureCollection(
            Lecture::filter($request->filters)
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
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        return new LectureShowResource($lecture);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $this->validate($request, []);

        return Lecture::updateRecord($request, $lecture);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Lecture $lecture)
    {
        $this->validate($request, []);

        return Lecture::destroyRecord($lecture);
    }
}
