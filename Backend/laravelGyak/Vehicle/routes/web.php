<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/vehicles');
});

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/sort/{sort?}', [VehicleController::class, 'index'])->name('vehicles.index.sort');
Route::get('/vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');

Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicles.store');

Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');

Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
Route::patch('/vehicles/{id}/update', [VehicleController::class, 'update'])->name('vehicle.update');

Route::post('/vehicles/{id}/reserve', [VehicleController::class, 'reserve'])->name('vehicle.reserve');
Route::post('/vehicles/{id}/leave', [VehicleController::class, 'leave'])->name('vehicle.leave');
