<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecapController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudyLectureController;

Route::get('dashboard', [DashboardController::class, 'index']);

Route::post('user/{user}/reset', [UserController::class, 'reset']);
Route::resource('user', UserController::class);

Route::resource('position', PositionController::class);

Route::resource('faculty', FacultyController::class);
Route::resource('faculty.study', StudyController::class);
Route::resource('faculty.study.lecture', StudyLectureController::class);
Route::resource('lecture', LectureController::class);

Route::post('recap/sync-recap', [RecapController::class, 'syncRecap']);
Route::get('recap/download', [RecapController::class, 'download']);
Route::resource('recap', RecapController::class);
