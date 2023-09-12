<?php

use App\Http\Controllers\Admin\Authcontroller;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('admins/view', [AdminController::class,'showSubscriptions'])->name('ViewSubscriptions');
Route::get('admins/viewf', [AdminController::class,'showFeedbacks'])->name('viewFeedbacks');
Route::get('admins/hosblk/{$id}', [AdminController::class,'blockHospital'])->name('Hospital.block');
Route::get('admins/add', [AdminController::class,'addHospital'])->name('addHos');
Route::post('admins/setdate', [AdminController::class,'setdate'])->name('setdate');
Route::get('admins/blockUser', [AdminController::class,'blockUser'])->name('blockUser');
Route::get('admins/blockHos/{id}', [AdminController::class,'blockHos'])->name('blockHos');
Route::get('admins/accept/{id}', [AdminController::class,'acceptHos'])->name('accept');
Route::get('admins/decline/{id}', [AdminController::class,'rejectHos'])->name('decline');

Route::prefix('admin')->name('admin.')->group(function(){
 Route::view('/login','Admin.log in')->name('login');
 Route::post('/login',[Authcontroller::class,'store']);

 Route::middleware(['auth:admin'])->group(function(){
    Route::post('/logout',[Authcontroller::class,'destroy'])->name('logout');
    Route::get('/home',[AdminController::class,'show'])->name('home');
 });
});