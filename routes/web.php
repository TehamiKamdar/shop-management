<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchasesController;
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
Route::group(['prefix'=>'suppliers'], function(){
    Route::get('/', [SupplierController::class , 'index'])->name('suppliers.index');
    Route::post('/', [SupplierController::class , 'storeSuppliers'])->name('suppliers.create');
    Route::get('list', [SupplierController::class , 'getSuppliers'])->name('suppliers.list');
    Route::get('select2', [SupplierController::class , 'select2'])->name('suppliers.select');
});
Route::group(['prefix'=>'products'], function(){
    Route::get('/', [ProductController::class , 'index'])->name('products.index');
    Route::post('/', [ProductController::class , 'storeProducts'])->name('products.create');
    Route::get('list', [ProductController::class , 'getProducts'])->name('products.list');
});
Route::group(['prefix'=>'purchases'], function(){
    Route::get('/', [PurchasesController::class , 'index'])->name('purchases.index');
    Route::post('/', [PurchasesController::class , 'storePurchases'])->name('purchases.create');
    Route::get('list', [PurchasesController::class , 'getPurchases'])->name('purchases.list');
});