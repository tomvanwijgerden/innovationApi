<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\AbsenceCourseController;


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('absence-courses', 'AbsenceCourseController');
});
