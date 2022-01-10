<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\AbsenceTypeController;

Route::group(['prefix' => 'absence-types', 'as' => 'absence-types.'], function () {
    Route::middleware('auth:sanctum')->get('/index', [AbsenceTypeController::class, 'index'])->name('index');
});
