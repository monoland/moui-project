<?php

namespace App\Http\Controllers;

use App\Models\Recap;
use App\Exports\RecapExport;
use Illuminate\Http\Request;
use App\Http\Resources\RecapCollection;
use Illuminate\Support\Facades\Artisan;
use App\Http\Resources\RecapShowResource;

class RecapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new RecapCollection(
            Recap::with(['faculty'])
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

        return Recap::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function show(Recap $recap)
    {
        return new RecapShowResource($recap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recap $recap)
    {
        $this->validate($request, []);

        return Recap::updateRecord($request, $recap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Recap $recap)
    {
        $this->validate($request, []);

        return Recap::destroyRecord($recap);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function syncRecap(Request $request)
    {
        return Artisan::call('moui:generate-recap');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function download(Request $request)
    {
        return (new RecapExport($request))->download(
            'rekap.xlsx',
            \Maatwebsite\Excel\Excel::XLSX
        );
    }
}
