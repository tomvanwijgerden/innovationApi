<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\EmployerController;

Route::group(['prefix' => 'employers', 'as' => 'employers.'], function () {
    Route::get('/index', [EmployerController::class, 'index'])->name('index');

    Route::get('{employer}/show', [EmployerController::class, 'show'])->name('show');

    Route::post('{employer}/store', [EmployerController::class, 'store'])->name('store');

    Route::post('{employer}/update', [EmployerController::class, 'update'])->name('update');

    Route::post('{employer}/delete', [EmployerController::class, 'delete'])->name('delete');
});
