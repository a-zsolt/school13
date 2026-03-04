<?php

use App\Http\Controllers\MintaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('minta', MintaController::class);
