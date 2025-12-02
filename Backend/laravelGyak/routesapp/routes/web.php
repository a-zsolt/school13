<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\helloController;
use Illuminate\Support\Facades\Route;

Route::get('/welcomeLar', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index'])
    -> name('page.hello');
Route::get('/hi/{name}', [HelloController::class, 'hi'])
    -> name('page.hi');

Route::name('page.')->group(function () {
    Route::get('/', [pageController::class, 'home'])
        -> name('home');;
    Route::get('/about', [pageController::class, 'about'])
        -> name('about');;
    Route::get('/contact', [pageController::class, 'contact'])
        -> name('contact');;
});

Route::post('/contact', [contactController::class, 'store']);
