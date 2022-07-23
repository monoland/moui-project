<?php

namespace Database\Seeders;

use App\Models\User;
use App\Imports\BasedataImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>  'superadmin',
            'email' => 'sample@dev',
            'password' => Hash::make('r4h4s14'),
            'theme' => 'blue-grey',
            'secured' => true
        ]);

        Excel::import(
            new BasedataImport($this->command),
            database_path('masters' . DIRECTORY_SEPARATOR . 'base-seeder.xlsx')
        );
    }
}
