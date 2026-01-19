<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/vehicles');
});

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/sort/{sort?}', [VehicleController::class, 'index'])->name('vehicles.index.sort');
Route::get('/vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
