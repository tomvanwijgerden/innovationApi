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
    Route::get('/index', [EmployeeController::class, 'index'])->name('index');

    Route::get('{employee}/show', [EmployeeController::class, 'show'])->name('show');

    Route::post('{employee}/store', [EmployeeController::class, 'store'])->name('store');

    Route::post('{employee}/update', [EmployeeController::class, 'update'])->name('update');

    Route::post('{employee}/delete', [EmployeeController::class, 'delete'])->name('delete');
});
