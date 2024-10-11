<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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




Route::get('/',[AdminController::class,'home'])->name('font.home');

Route::get('/room/detail/{id}',[HomeController::class,'room_details'])->name('room.details');
Route::get('/room/booking/{id}',[HomeController::class,'room_booking'])->name('room.booking');
Route::post('/room/add-booking/{id}',[HomeController::class,'add_booking'])->name('room.add.booking');


Route::get('/home',[AdminController::class,'index'])->name('home');
Route::get('/create/room',[AdminController::class,'create_room'])->name('create.room');
Route::get('/room/list',[AdminController::class,'room_list'])->name('room.list');
Route::post('/add/room',[AdminController::class,'add_room'])->name('add.room');
Route::get('/room/edit/{id}',[AdminController::class,'room_edit'])->name('room.edit');
Route::post('/room/update/{id}',[AdminController::class,'room_update'])->name('room.update');
Route::delete('/room/delete/{id}',[AdminController::class,'room_delete'])->name('room.delete');
Route::get('/admin/booking',[AdminController::class,'admin_booking'])->name('admin.booking');
Route::delete('/admin/booking/delete/{id}',[AdminController::class,'admin_booking_delete'])->name('admin.booking.delete');
