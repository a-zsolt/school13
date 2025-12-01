<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\helloController;
use Illuminate\Support\Facades\Route;

Route::get('/welcomeLar', function () {
    return view('welcome');
});

//Route::get('/hello', function () {
//   return 'Yo wsg ma nigga';
//});

Route::get('/hello', [HelloController::class, 'index']);
Route::get('/hi/{name}', [HelloController::class, 'hi']);

Route::get('/', [pageController::class, 'home']);
Route::get('/about', [pageController::class, 'about']);
Route::get('/contact', [pageController::class, 'contact']);

Route::post('/contact', [contactController::class, 'store']);
