<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TicketController;
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
Route::get('ticket/index',[ TicketController::class,'index'])->name("home");
Route::post('create/ticket',[ TicketController::class,'stor'])->name("create-ticket");
Route::get('ticket/add',[ TicketController::class,'create'])->name("add-ticket");
Route::get('ticket/show/{id}',[ TicketController::class,'show'])->name("show-ticket");
Route::get('ticket/edit/{id}',[ TicketController::class,'edit'])->name("edit-ticket");
Route::post('ticket/update/{id}',[ TicketController::class,'update'])->name("update-ticket");
Route::get('ticket/delete',[ TicketController::class,'destroy'])->name("delete-ticket");

Route::get('rating/index',[ RatingController::class,'index'])->name("home");
Route::post('rating/create',[ RatingController::class,'store'])->name("create-rating");
Route::get('rating/show',[ RatingController::class,'show'])->name("show-rating");
Route::get('rating/edit/{id}',[ RatingController::class,'edit'])->name("edit-rating");
Route::post('rating/update/{id}',[ RatingController::class,'update'])->name("update-rating");
Route::get('rating/create',[ RatingController::class,'create'])->name("add-rating");
Route::get('rating/delete',[ RatingController::class,'destroy'])->name("delete-rating");

