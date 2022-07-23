<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Http\Resources\ScholarshipCollection;
use App\Http\Resources\ScholarshipShowResource;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new ScholarshipCollection(
            Scholarship::filter($request->filters)
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

        return Scholarship::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {
        return new ScholarshipShowResource($scholarship);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        $this->validate($request, []);

        return Scholarship::updateRecord($request, $scholarship);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Scholarship $scholarship)
    {
        $this->validate($request, []);

        return Scholarship::destroyRecord($scholarship);
    }
}
