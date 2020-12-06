<?php

use App\Http\Controllers\Api\V1\User\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.v1.')->prefix('/v1')->group(function () {
    Route::prefix('/user')->name('user.')->group(function () {
        Route::apiResource('', CrudController::class);
    });
});
