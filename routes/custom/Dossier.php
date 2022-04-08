<?php
/*
|--------------------------------------------------------------------------
| employer
|--------------------------------------------------------------------------
|
| This routes are the routes needed for the employees.
*/

use App\Http\Controllers\DossierController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('dossiers', 'DossierController');
});

Route::group(['prefix' => 'dossiers', 'as' => 'dossiers.' ,'middleware' => 'auth:sanctum'], function () {
    Route::get('/last-viewed-dossiers', [
        'as'   => 'last-viewed-dossiers',
        'uses' => 'DossierController@lastViewedDossiers',
    ]);
});
