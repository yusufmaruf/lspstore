<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\IndonesiaController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardAdminController;

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

Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');



Route::middleware('auth')->group(function () {
    Route::delete('cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/{id}', [CartController::class, 'store'])->name('add-cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::resource('account', MyAccountController::class);
    route::resource('checkout', CheckOutController::class);
    route::resource('invoice', InvoiceController::class);
    route::get('cetak/{invoice}', [InvoiceController::class, 'cetak'])->name('invoice.cetak');
});


Route::prefix('admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/', [DashboardAdminController::class, 'index'])->name('admin.index');
        Route::get('/category/data', [CategoryController::class, 'data'])->name('category.data');
        Route::get('/product/data', [ProductController::class, 'data'])->name('product.data');
        Route::get('/users/data', [UserController::class, 'data'])->name('users.data');



        Route::get('selectProv', [IndonesiaController::class, 'provinsi'])->name('provinsi.index');
        Route::get('/selectRegenc/{id}', [IndonesiaController::class, 'regency'])->name('kota.index');

        Route::resource('category', CategoryController::class);
        Route::resource('user', UserController::class);
        Route::resource('product', ProductController::class);
        Route::resource('transaksi', TransaksiController::class);
    });

Auth::routes();
