<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

Route::name('pages.') -> group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/word/{text}', [WordController::class, 'show'])->name('word');
});


