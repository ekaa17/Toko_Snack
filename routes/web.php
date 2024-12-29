<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;

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
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::group(['middleware' => 'cekrole:Admin,Karyawan'], function() {
    // isi dengan link apa saja yang ketika diakses harus login
    Route::get('/dashboard', [LoginController::class, 'dashboard']);
    Route::resource('/data-staff', StaffController::class)->names('data-staff');
    Route::resource('/data-product', ProductController::class)->names('data-product');
    Route::resource('/data-customer', CustomerController::class)->names('data-customer');
    Route::resource('/data-supplier', SupplierController::class)->names('data-supplier');
    Route::resource('/data-transaction', TransactionController::class)->names('data-transaction');
    Route::resource('/data-transactiondetail', TransactionDetailController::class)->names('data-transactiondetail');

});



