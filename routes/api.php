<?php

use App\Http\Controllers\Api\V1\DeviceController;
use App\Http\Controllers\Api\V1\MeasuresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    /**
     * FOR DEVICES REGISTER
     */
    Route::resource('devices', DeviceController::class);

    /**
     * MEASURES
     */

    Route::resource('measures', MeasuresController::class);
    // Route::get('measures/{user}')
})->name('api.v1.');
