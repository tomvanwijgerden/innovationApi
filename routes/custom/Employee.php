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
