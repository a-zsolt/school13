<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NumberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/number/{num}', [NumberController::class, 'show']);
