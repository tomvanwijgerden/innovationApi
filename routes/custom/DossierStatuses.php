<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\AbsenceTypeController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('dossier-statuses', 'AbsenceTypeController')
         ->only('index');
});
