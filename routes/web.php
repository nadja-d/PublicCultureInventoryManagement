<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/order', [OrderController::class, 'showOrder'])->name('order');
Route::get('/search-product', [ProductController::class, 'search'])->name('search-product');
Route::get('/add-new-product', [ProductController::class, 'showAddNewProduct'])->name('add-new-product');
Route::post('/add-new-product', [ProductController::class, 'createProduct'])->name('product.createProduct');
Route::post('/edit-product', [ProductController::class, 'viewProduct'])->name('edit-product');

Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('update-product');
Route::get('/delete-product', [ProductController::class, 'viewDeleteProduct'])->name('delete-product');
Route::delete('/delete-product', [ProductController::class, 'deleteProduct'])->name('delete-product');
