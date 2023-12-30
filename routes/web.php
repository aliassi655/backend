<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BookingController;

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

Route::get('/nn', function () {
    return view('welcome');
});
// table company
Route::get('/', [CompanyController::class ,'index'])->name('showcompany');
Route::get('add',  [CompanyController::class ,'store'])->name('addcompany');
Route::get('edit/{id}',  [CompanyController::class ,'edit'])->name('editcompany');
Route::post('update/company/{id}',  [CompanyController::class ,'update'])->name('updatecompany');
Route::post('delete/company/{id}',  [CompanyController::class ,'destroy'])->name('deletcompany');
//------------------------------------------------------------------------------------------------
                                    /*{{end}}*/
//------------------------------------------------------------------------------------------------
//table city
Route::get('/c', [CityController::class ,'index'])->name('showcity');
Route::get('add/', [CityController::class ,'store'])->name('addcity');
Route::get('edit/{id}',  [CityController::class ,'edit'])->name('editcity');
Route::post('update/city/{id}',  [CityController::class ,'update'])->name('updatecity');
Route::get('delete/city/{id}',  [CityController::class ,'destroy'])->name('deletcity');
//-------------------------------------------------------------------------------------------------
                                    /*{{end}}*/
//-------------------------------------------------------------------------------------------------
//table Booking
Route::get('/bb', [BookingController::class ,'index'])->name('showbooking');
Route::get('add/a', [BookingController::class ,'store'])->name('addbooking');
Route::get('add/aa', [BookingController::class ,'create'])->name('aaddbooking');
Route::get('edit/{id}',  [BookingController::class ,'edit'])->name('editbooking');
Route::post('update/booking/{id}',  [BookingController::class ,'update'])->name('updatebooking');
Route::get('delete/booking/{id}',  [BookingController::class ,'destroy'])->name('deletbooking');
Route::get('add/data', [BookingController::class ,'adddata'])->name('adddata');
