<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', 'App\Http\Controllers\CategoryController');

Route::resource('products', 'App\Http\Controllers\ProductController');

Route::get('shop', [ProductController::class, 'shop'])->name('products.shop');

Route::resource('carts', 'App\Http\Controllers\CartController');

Route::resource('orders', 'App\Http\Controllers\OrderController');

Route::get('api/latest_products', [ApiController::class, 'latest_products']);
Route::get('api/categories/{id}', [ApiController::class, 'categories']);
Route::get('api/order_product/', [ApiController::class, 'order_product'])->name('api.order_product');
Route::post('api/order_ajax/', [ApiController::class, 'order_ajax'])->name('api.order_ajax');
