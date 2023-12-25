<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return redirect()->route('dashboard.admin');
});
Route::get('dashboard', [ProductController::class, 'dashboard'])->name('dashboard.admin');
Route::get('products', [ProductController::class, 'products'])->name('admin.products');
Route::get('product/create',[ProductController::class, 'create'])->name('admin.product.create');
Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');

