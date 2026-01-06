<?php

use App\Http\Controllers\SiteDemoController;
use App\Http\Controllers\ProductDemoController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Publikus oldal

Route::get('/products', [ProductDemoController::class, 'index'])
    ->name('products.index');
Route::get('/', [OrderController::class, 'home'])
    ->name('orders.home');

// vevői oldal
Route::get('/order/preview', [OrderController::class, 'preview'])
    ->name('order.preview');
Route::get('/order/submit', [OrderController::class, 'submit'])
    ->name('order.submit');

// admin oldal
Route::get('/order/order/{id}', [OrderController::class, 'show'])
    ->name('admin.order.show');
Route::get('/admin/system-health', [SiteDemoController::class, 'system_health'])
    ->name('admin.system_health');

Route::get('/admin/product/create', [ProductDemoController::class, 'create'])
    ->name('admin.product.create');
Route::post('/admin/products', [ProductDemoController::class, 'store'])
    ->name('admin.product.store');

//------------------------------------------------------------------------------

Route::get('/test-log', function () {
    Log::info('test log végpont megtekíntésre került');
    Log::warning('A test-log végpontot megtekíntette a főnk');
    Log::error('A test-log végpont összeomlott..');

    return 'TEST LOG LEFUTOTT';
});
Route::get('/divide/{a}/{b}', function ($a, $b) {
    return $a / $b;
});
Route::get('/prod/{id}', function ($id){
   Log::emergency('Product not found {id}', ['id' => $id]);
});

//----------------------------------------------------------------------------------


