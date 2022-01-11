<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\EmployerController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('employers', 'EmployerController');
});
