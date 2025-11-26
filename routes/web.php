<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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
    return view('admin.index');
})->name('index');
Route::group(['prefix'=>'supplier'], function(){
    Route::get('/', [SupplierController::class , 'index'])->name('suppliers.index');
    Route::post('/', [SupplierController::class , 'storeSuppliers'])->name('suppliers.create');
    Route::get('list', [SupplierController::class , 'getSuppliers'])->name('suppliers.list');
});
Route::group(['prefix'=>'product'], function(){
    Route::get('/', [ProductController::class , 'index'])->name('products.index');
    Route::post('/', [ProductController::class , 'storeProducts'])->name('products.create');
    Route::get('list', [ProductController::class , 'getProducts'])->name('products.list');
});