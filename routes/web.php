<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Customer_HotelController;
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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*Route::get('company/add',
    [\App\Http\Controllers\CompanyController::class,'add'])
    ->middleware('auth')
    ->name('company.add');*/

    Route::get('view_hotels', [HotelController::class, 'index']);
    Route::get('add_hotel', [HotelController::class, 'create'])->name('add.hotel');
    Route::post('store_hotel', [HotelController::class, 'store'])->name('store.hotel');
    Route::get('edit_hotel/{id}', [HotelController::class,'edit'])->name("edit.hotel");
    Route::post('update_hotel/{id}', [HotelController::class, 'update'])->name('update.hotel');
   // ________________________________________________________________________//
   Route::get('view_customer', [CustomerController::class, 'index']);
   Route::get('add_customer', [CustomerController::class, 'create'])->name("add.customer");
   Route::post('store_customer', [CustomerController::class, 'store'])->name("store.customer");
   Route::get('edit_customer', [CustomerController::class, 'edit'])->name("edit.customer");
   Route::post('update_customer', [CustomerController::class, 'update'])->name("update.customer");
   // ________________________________________________________________________//
   Route::get('view_customer.hotel', [CustomerHotelController::class, 'index']);
   Route::get('add_customer.hotel', [CustomerHotelController::class, 'create'])->name("add.customer.hotel");
   Route::post('store_customer.hotel', [CustomerHotelController::class, 'store'])->name("store.customer.hotel");
   Route::get('edit_customer.hotel', [CustomerHotelController::class, 'edit'])->name("edit.customer.hotel");
   Route::post('update_customer.hotel', [CustomerHotelController::class, 'update'])->name("update.customer.hotel");

