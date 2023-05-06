<?php

use App\Http\Controllers\Doctor\AuthController;
use App\Http\Controllers\Doctor\DoctorController;
use Illuminate\Support\Facades\Route;


Route::get('doctor/login',[AuthController::class,'loginView'])->name('doctor.login.view');
Route::post('doctor/login',[AuthController::class,'login'])->name('doctor.login');


Route::group(['prefix'=>'doctor','middleware'=>'auth:doctor','controller'=>DoctorController::class],function(){

    Route::get('/index','index')->name('doctor.home');
    Route::post('/medical-statment','store')->name('doctor.medical.state');

});