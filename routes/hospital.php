<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Authcontroller;
use App\Http\Controllers\HospitalController;

Route::get('hospitals/feedback',function () {
    return view('Hospital.HosFeedback');
})->name('hospitalFeedback');
Route::get('/hregister', function () {
    return view('Hospital.register');
})->name('registerhospital');
Route::post('hospital/register',[HospitalController::class,'createhospital'])->name('hospitalregister');
Route::get('hospitals/viewresponse', [HospitalController::class,'viewresponse'])->name('hospitalViewres');
Route::post('hospitals/sendfeedback', [HospitalController::class,'sendFeedback'])->name('sendfeedback');
Route::get('hospitals/bedReq', [HospitalController::class,'viewBedReq'])->name('reservationRequests');
Route::get('hospitals/ambReq', [HospitalController::class,'viewAmbReq'])->name('ambulanceRequests');
Route::get('hospitals/acceptres/{id}', [HospitalController::class,'acceptres'])->name('acceptres');
Route::get('hospitals/rejectres/{id}', [HospitalController::class,'rejectres'])->name('rejectres');
Route::get('hospitals/acceptreq/{id}', [HospitalController::class,'acceptreq'])->name('acceptreq');
Route::get('hospitals/rejectreq/{id}', [HospitalController::class,'rejectreq'])->name('rejectreq');
Route::get('hospitals/update', function(){return view('Hospital.HosUpdateProfile');})->name('hospital.update');
Route::put('hospitals/update', [HospitalController::class,'updateprofile'])->name('hospital.edit');
Route::get('hresett', function () {
    return view('Hospital.updatepass');
}
)->name('hpassupdate');
Route::put('hresetres', [HospitalController::class,'hpassupdate'])->name('hpassupdatee');

Route::prefix('hospital')->name('hospital.')->group(function(){
    Route::get('hospital/login',function(){return view('Hospital.log in');})->name('login');
    Route::post('hospital/login',[HospitalController::class,'HosLog'])->name('logform');
    
   
    Route::middleware(['auth:hospital'])->group(function(){
       Route::post('/logout',[HospitalController::class,'destroy'])->name('logout');
       
       Route::get('hospital/profile', function () {
        return view('Hospital.HosProfile');
    })->name('profile');

       Route::get('hospital/hhome', function () {
        return view('home');
       })->name('home');


    });
    Route::get('/forgot-password', function(){
        return view('Hospital.recovery');
      })->name('forgot-password');
      Route::post('forget-password', [HospitalController::class, 'submitForgetPasswordForm'])->name('forget.password'); 
      Route::get('reset-password/{token}', [HospitalController::class, 'showResetPasswordForm'])->name('reset.passwordlink');
      Route::post('reset-password', [HospitalController::class, 'submitResetPasswordForm'])->name('reset.password');


   });