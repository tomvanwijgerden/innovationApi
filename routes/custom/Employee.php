<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\EmployeeController;

Route::apiResource('employees', 'EmployeeController')
     ->middleware('auth:sanctum');

Route::group(['prefix' => 'employees', 'as' => 'employees.', 'middleware' => 'auth:sanctum'], function () {
    Route::get('{employee}/dossiers', [
        'as'   => 'dossiers',
        'uses' => 'EmployeeController@dossiers',
    ]);
});

