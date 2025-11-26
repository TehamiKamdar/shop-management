<?php

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
    Route::post('/', [SupplierController::class , 'storeSupplier'])->name('suppliers.create');
    Route::get('list', [SupplierController::class , 'getSuppliers'])->name('suppliers.list');
});