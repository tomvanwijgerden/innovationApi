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
    Route::middleware('auth:sanctum')->get('/index', [AbsenceCourseController::class, 'index'])->name('index');

    Route::middleware('auth:sanctum')->get('{absenceCourse}/show', [AbsenceCourseController::class, 'show'])->name('show');

    Route::middleware('auth:sanctum')->post('/store', [AbsenceCourseController::class, 'store'])->name('store');

    Route::middleware('auth:sanctum')->post('{absenceCourse}/update', [AbsenceCourseController::class, 'update'])->name('update');

    Route::middleware('auth:sanctum')->post('{absenceCourse}/delete', [AbsenceCourseController::class, 'delete'])->name('delete');
});
