<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\DossierController;

Route::group(['prefix' => 'dossiers', 'as' => 'dossiers.'], function () {
    Route::middleware('auth:sanctum')->get('/index', [DossierController::class, 'index'])->name('index');

    Route::middleware('auth:sanctum')->get('{dossier}/show', [DossierController::class, 'show'])->name('show');

    Route::middleware('auth:sanctum')->post('{dossier}/update', [DossierController::class, 'update'])->name('update');

    Route::middleware('auth:sanctum')->post('{dossier}/delete', [DossierController::class, 'delete'])->name('delete');
});
