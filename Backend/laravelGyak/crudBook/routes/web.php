<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');

Route::delete('/books/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

Route::patch('/books/update/{id}', [BookController::class, 'update'])->name('books.update');
