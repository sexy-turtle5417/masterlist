<?php

use App\Http\Controllers\SemesterController;
use App\Models\Semester;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestSemester = Semester::latest('id')->first();
    return to_route('semesters.show', [$latestSemester->id]);
});

Route::resource('semesters', SemesterController::class);
