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
    Route::middleware('auth:sanctum')->get('/index', [EmployerController::class, 'index'])->name('index');

    Route::middleware('auth:sanctum')->get('{employer}/show', [EmployerController::class, 'show'])->name('show');

    Route::middleware('auth:sanctum')->post('{employer}/store', [EmployerController::class, 'store'])->name('store');

    Route::middleware('auth:sanctum')->post('{employer}/update', [EmployerController::class, 'update'])->name('update');

    Route::middleware('auth:sanctum')->post('{employer}/delete', [EmployerController::class, 'delete'])->name('delete');
});
