<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT',5);


Route::group(['prefix'=>'admin','controller'=>AdminController::class],function(){
    //Return DashBoard View
    Route::get('/index','index')->name('admin.home');

############################### Doctors ###############################
    Route::group(['prefix'=>'doctor','controller'=>DoctorController::class],function(){
        Route::get('/all_doctors','get_all_doctors')->name('all.doctors');//Show All Doctors
        Route::get('/add','add')->name('doctor.add');//Return Add Form
        Route::post('/store','store')->name('doctor.store');//Store Doctor in Doctor Table
        Route::get('/{doc_id}/edit','edit')->name('doctor.edit');//Return Edit From
        Route::post('/update','update')->name('doctor.update');//Update Doctor Data
        Route::get('/{doc_id}/delete','delete')->name('doctor.delete');//Delete Doctor Date
    });
############################### Doctors ###############################

############################### Patients ###############################
Route::get('/patients',[PatientController::class,'get_all_patients'])->name('all.patients');
############################### Patients ###############################

############################### Applications ###############################
Route::get('/applications',[ApplicationController::class,'get_all_applications'])->name('all.applications');
############################### Applications ###############################
});
