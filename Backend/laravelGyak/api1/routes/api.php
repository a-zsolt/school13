<?php

use App\Http\Controllers\api\VehicleController;
use App\Http\Controllers\Api\VehicleResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/termek', [\App\Http\Controllers\Api\TermekController::class, 'index']);
Route::apiResource('termekek', \App\Http\Controllers\Api\TermekController::class);
    //->except(['store', 'update', 'destroy']);
    //->only(['destroy']);

Route::apiResource('vehicles', VehicleResourceController::class);
Route::patch('/vehicles/{vehicle}/restore', [VehicleResourceController::class, 'restore'])->name('vehicles.restore');
