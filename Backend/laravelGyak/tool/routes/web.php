<?php

use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('tools', [ToolController::class, 'index'])->name('tools.index');
Route::get('tools/{id}', [ToolController::class, 'show'])->name('tools.show');
