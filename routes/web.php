<?php

use App\Http\Controllers\Admin\AdminCategorieController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::middleware('admin')->group(function () {
    // Admin Home Route
    Route::get('/admin', [AdminHomeController::class, 'index'])->name("admin.home.index");

    // Product Routes
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name("admin.product.index");
    Route::post('/admin/products/store', [AdminProductController::class, 'store'])->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', [AdminProductController::class, 'delete'])->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', [AdminProductController::class, 'update'])->name("admin.product.update");
    Route::get('/admin/products/filter', [AdminProductController::class, 'filter'])->name('admin.product.filter');

    // Category Routes
    Route::get('admin/categories', [AdminCategorieController::class, "index"])->name("admin.categorie.index");
    Route::post('admin/categories/store', [AdminCategorieController::class, "store"])->name("admin.categorie.store");
    Route::delete('admin/categories/{id}', [AdminCategorieController::class, 'delete'])->name("admin.categorie.delete");
    Route::get('admin/categories/{id}/edit', [AdminCategorieController::class, 'edit'])->name("admin.categorie.edit");
    Route::put('admin/categories/{id}/update', [AdminCategorieController::class, 'update'])->name("admin.categorie.update");
});


Auth::routes();
