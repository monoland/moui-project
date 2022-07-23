<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BasedataImport implements WithMultipleSheets
{
    /**
     * the module has role table
     */
    protected $command;

    /**
     * base module constructor
     */
    public function __construct($command = null)
    {
        $this->command = $command;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function sheets(): array
    {
        return [
            'universities' => new UniversityImport(),
            'positions' => new PositionImport(),
            'faculties' => new FacultyImport(),
            'studies' => new StudyImport(),
            'lectures' => new LectureImport(),
        ];
    }
}
