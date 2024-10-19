<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;

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
Route::get('/reservation/list',[HomeController::class,'resrvation_list'])->name('reservetion.list');
Route::get('/booking-confirmation',[HomeController::class,'booking_confarmation'])->name('booking.confirmation');
Route::delete('/booking-confirmation/delete/{id}',[HomeController::class,'booking_confarmation_delete'])->name('booking.confirmation.delete');

Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/videos/store', [VideoController::class, 'store'])->name('videos.store');
Route::get('/videos/show', [VideoController::class, 'show_videos'])->name('show.videos');
Route::delete('/videos/{id}', [VideoController::class, 'delete'])->name('videos.delete');



Route::get('/home',[AdminController::class,'index'])->name('home');
Route::get('/create/room',[AdminController::class,'create_room'])->name('create.room');
Route::get('/room/list',[AdminController::class,'room_list'])->name('room.list');
Route::post('/add/room',[AdminController::class,'add_room'])->name('add.room');
Route::get('/room/edit/{id}',[AdminController::class,'room_edit'])->name('room.edit');
Route::post('/room/update/{id}',[AdminController::class,'room_update'])->name('room.update');
Route::delete('/room/delete/{id}',[AdminController::class,'room_delete'])->name('room.delete');


Route::get('/admin/booking',[AdminController::class,'admin_booking'])->name('admin.booking');
Route::delete('/admin/booking/delete/{id}',[AdminController::class,'admin_booking_delete'])->name('admin.booking.delete');
Route::get('/admin/booking/confirm/{id}',[AdminController::class,'admin_booking_confirm'])->name('admin.booking.confirm');
Route::get('/admin/booking/rejected/{id}',[AdminController::class,'admin_booking_rejected'])->name('admin.booking.regected');
Route::get('/admin/gallery',[AdminController::class,'admin_gallery_view'])->name('admin.gallery.view');


Route::get('/admin/create/gallery',[AdminController::class,'admin_gallery_create'])->name('admin.create.gallery');
Route::post('/admin/add/gallery',[AdminController::class,'add_gallery'])->name('admin.add.gallery');
Route::delete('/admin/delete/gallery/{id}',[AdminController::class,'delete_gallery'])->name('gallery.delete');

Route::get('/contact/view',[AdminController::class,'contact_view'])->name('contact.view');
Route::post('/contact',[AdminController::class,'contact'])->name('contact');
Route::delete('/contact/delete/{id}',[AdminController::class,'contact_delete'])->name('contact.delete');

Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/our-room',[HomeController::class,'our_room'])->name('ourroom');
Route::get('/gallery',[HomeController::class,'gallery'])->name('gallery');
Route::get('/contact-us',[HomeController::class,'contact_us'])->name('contact.us');

Route::get('/contact/Email/{id}',[AdminController::class,'contact_email'])->name('contact.email');
Route::post('/Send/Email/{id}',[AdminController::class,'send_email'])->name('send.email');

