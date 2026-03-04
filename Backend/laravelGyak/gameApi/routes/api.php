<?php

use App\Http\Controllers\api\GamesController;
use App\Http\Controllers\api\GamesResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('games', GamesResourceController::class);
Route::patch('games/{game}/restore', [GamesResourceController::class, 'restore'])->name('games.restore');

