<?php

use App\Http\Controllers\CategoriesController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\IndonesiaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomesController::class, 'index'])->name('homes.index');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [CategoriesController::class, 'detail'])->name('categories-detail');

Route::get('/homes', function () {
    return view('layouts.master');
});

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        // Route::get('/', [DashboardController::class, 'index'])->name('adminDashboard');
        Route::get('/category/data', [CategoryController::class, 'data'])->name('category.data');
        Route::get('/product/data', [ProductController::class, 'data'])->name('product.data');
        Route::get('/users/data', [UserController::class, 'data'])->name('users.data');



        Route::get('selectProv', [IndonesiaController::class, 'provinsi'])->name('provinsi.index');
        Route::get('/selectRegenc/{id}', [IndonesiaController::class, 'regency'])->name('kota.index');

        Route::resource('category', CategoryController::class);
        Route::resource('user', UserController::class);
        Route::resource('product', ProductController::class);
    });

Auth::routes();
