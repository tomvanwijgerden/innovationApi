<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\EmployeeController;

Route::group(['prefix' => 'employees', 'as' => 'employees.'], function () {
    Route::middleware('auth:sanctum')->get('/index', [EmployeeController::class, 'index'])->name('index');

    Route::middleware('auth:sanctum')->get('{employee}/show', [EmployeeController::class, 'show'])->name('show');

    Route::middleware('auth:sanctum')->post('{employee}/store', [EmployeeController::class, 'store'])->name('store');

    Route::middleware('auth:sanctum')->post('{employee}/update', [EmployeeController::class, 'update'])->name('update');

    Route::middleware('auth:sanctum')->post('{employee}/delete', [EmployeeController::class, 'delete'])->name('delete');
});
