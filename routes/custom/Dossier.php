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
    Route::get('/index', [DossierController::class, 'index'])->name('index');

    Route::get('{dossier}/show', [DossierController::class, 'show'])->name('show');

    Route::post('{dossier}/update', [DossierController::class, 'update'])->name('update');

    Route::post('{dossier}/delete', [DossierController::class, 'delete'])->name('delete');
});
