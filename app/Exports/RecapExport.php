<?php

namespace App\Exports;

use App\Models\Recap;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class RecapExport implements FromView
{
    use Exportable;

    /**
     * the module has role table
     */
    protected $request;

    /**
     * base module constructor
     */
    public function __construct($request = null)
    {
        $this->request = $request;
    }

    /**
     * Undocumented function
     *
     * @return View
     */
    public function view(): View
    {
        return view('recaps', [
            'recaps' => Recap::with(['faculty'])
                ->filter($this->request->filters)
                ->orderBy('faculty_id')
                ->get()
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Recap::with(['faculty'])
            ->filter($this->request->filters)
            ->get();
    }
}
