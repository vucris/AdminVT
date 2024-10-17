<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return redirect('/trang-chu');
});

Auth::routes();

Route::get('/trang-chu', [App\Http\Controllers\HomeController::class, 'index'])->name('trang-chu');
Route::prefix('/admin')->group(function () {
    Route::prefix('/shop')->group(function () {
        Route::get('/getListCategory', [CategoryController::class, 'getListCategory'])->name('admin.shop.category.index');
        Route::get('/getListProduct', [ProductController::class, 'getListProduct'])->name('admin.shop.product.index');
    });
});
