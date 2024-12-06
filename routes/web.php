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
        Route::get('/getListProduct', [ProductController::class, 'getListProduct'])->name('admin.shop.product.index');



        Route::get('/getListCategory', [CategoryController::class, 'getListCategory'])->name('admin.shop.category.index');
        // thêm mới danh mục
        Route::get('/createCategory', [CategoryController::class, 'createCategory'])->name('admin.shop.category.create');
        Route::post('/storeCategory', [CategoryController::class, 'storeCategory'])->name('admin.shop.category.store');

        //chỉnh sửa
        Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('admin.shop.category.edit');
        Route::put('/uploadCategory/{id}', [CategoryController::class, 'uploadCategory'])->name('admin.shop.category.upload');

        // xóa danh mục
        Route::delete('/delete/Category/{id}', [CategoryController::class, 'destroyCategory'])->name('admin.shop.category.destroy');
        Route::delete('/deleteAll/Category', [CategoryController::class, 'deleteAll'])->name('admin.shop.category.deleteAll');





    });
});
