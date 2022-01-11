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
