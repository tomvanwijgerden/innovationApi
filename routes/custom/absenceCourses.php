<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\AbsenceCourseController;

Route::group(['prefix' => 'absence-courses', 'as' => 'absence-courses.'], function () {
    Route::get('/index', [AbsenceCourseController::class, 'index'])->name('index');

    Route::get('{absenceCourse}/show', [AbsenceCourseController::class, 'show'])->name('show');

    Route::post('{absenceCourse}/store', [AbsenceCourseController::class, 'store'])->name('store');

    Route::post('{absenceCourse}/update', [AbsenceCourseController::class, 'update'])->name('update');

    Route::post('{absenceCourse}/delete', [AbsenceCourseController::class, 'delete'])->name('delete');
});
