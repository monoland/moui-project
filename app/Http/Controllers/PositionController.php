<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\PositionCollection;
use App\Http\Resources\PositionShowResource;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new PositionCollection(
            Position::withCount([
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

        return Position::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return new PositionShowResource($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $this->validate($request, []);

        return Position::updateRecord($request, $position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Position $position)
    {
        $this->validate($request, []);

        return Position::destroyRecord($position);
    }
}
