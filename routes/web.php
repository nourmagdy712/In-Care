<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

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
    return view('home');
})->name('welcome');
Route::get('/search', [SearchController::class,'search'])->name('search');
Route::get('/search/{id}', [SearchController::class,'advsearch'])->name('advsearch');



//users

Route::middleware(['auth'])->group(function(){
   /* Route::get('/reservee',function ()
    {
    })->name('reserveee');*/
    Route::post('/reserve/{id}', [UserController::class,'reserveBed'])->name('reserve');

    Route::get('users/profile/update',function(){
        return view('user.UpdateProfile');
    });
    Route::put('users/profile/update',[UserController::class,'updateprofile'])->name('updateProfile');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('/logout',[UserController::class,'destroy'])->name('logout');


    Route::get('/profile', function () {
        return view('user.profile');
    })->name('profile');
  
 });

 Route::get('/register', function () {
    return view('auth.uregister');
})->name('registeruser');

Route::post('user/register',[UserController::class,'createuser'])->name('registerform');

 Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login',[UserController::class,'userlog'])->name('logform');
Route::get('/forgot-password', function(){
    return view('auth.forgot-password');
  })->name('forgot-password');
  Route::post('forget-password', [UserController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
  Route::get('reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('reset.password.get');
  Route::post('reset-password', [UserController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('/profile/edit', function () {
    return view('user.UpdateProfile');
})->name('profile.edit');
Route::get('resett',  function () {
    return view('user.updatepass');
}
)->name('passupdate');
Route::put('resetres', [UserController::class, 'passupdate'])->name('passupdatee');



Route::get('/profile/password', function () {
    return view('user.UpdatePassword');
})->name('profile.password');

Route::get('/profile/feedback', function () {
    return view('user.FeedBack');
})->name('user.FeedBack');
Route::post('/feedback', [UserController::class,'sendFeedback'])->name('feedback');
Route::get('/profile/reservations', [UserController::class,'cancelReservation'] )->name('user.cancelReservation');
Route::get('/profile/reservations/{id}', [UserController::class,'cancel'] )->name('cancel');
Route::get('/profile/ambreservations/{id}', [UserController::class,'cancelAmb'] )->name('cancelAmb');
Route::get('/profile/histories', [UserController::class,'viewHistory'])->name('UserReservationHis');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/viewResponse', [UserController::class, 'viewResponse'])->name('response');
Route::post('/profile/request/{id}', [UserController::class, 'requestAmb'])->name('requestAmbu');

require __DIR__ .'/admin.php';
require __DIR__ .'/hospital.php';
