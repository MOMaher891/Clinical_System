<?php

use App\Http\Controllers\Doctor\AuthController;
use App\Http\Controllers\Doctor\DoctorController;
use Illuminate\Support\Facades\Route;


Route::get('doctor/login',[AuthController::class,'loginView'])->name('doctor.login.view');
Route::post('doctor/login',[AuthController::class,'login'])->name('doctor.login');
Route::get('doctor/{doc_id}/profile',[DoctorController::class,'doctor_profile'])->name('admin.doctor.profile')->middleware('auth');

Route::group(['prefix'=>'doctor','middleware'=>'auth:doctor','controller'=>DoctorController::class],function(){
    Route::get('/index','index')->name('doctor.home');
    Route::post('/medical-Statement','store')->name('doctor.medical.state');
    /**
     * Return Medical Statement
     */
    Route::get('/all_statements','all_statements')->name('all.statements');
});


