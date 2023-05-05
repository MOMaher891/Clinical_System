<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

// define('PAGINATION_COUNT',5);


Route::group(['prefix'=>'admin','middleware'=>'auth','controller'=>AdminController::class],function(){
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
    Route::group(['prefix'=>'patient','controller'=>PatientController::class],function(){
        Route::get('/all_patients','get_all_patients')->name('all.patients');//Show All Patients
        Route::get('/add','add')->name('patient.add');//Return Add Form
        Route::post('/store','store')->name('patient.store');//Store Patient in Patient Table
        Route::get('/{pat_id}/edit','edit')->name('patient.edit');//Return Edit From
        Route::post('/update','update')->name('patient.update');//Update Patient Data
        Route::get('/{pat_id}/delete','delete')->name('patient.delete');//Delete Patient Date

        Route::get('download-excel','export')->name('patient.export');
        Route::get('{pat_id}/specific_application/','get_all_applications_for_specific_patient')->name('patient.specific_app');//Return Specific App
    });
############################### Patients ###############################

############################### Applications ###############################

    Route::group(['prefix'=>'application','controller'=>ApplicationController::class],function(){
        Route::get('/all_applications','get_all_applications')->name('all.applications');//Show All Patients
        Route::get('/add','add')->name('application.add');//Return Add Form
        Route::post('/store','store')->name('application.store');//Store Patient in Patient Table
        Route::get('/{app_id}/edit','edit')->name('application.edit');//Return Edit From
        Route::post('/update','update')->name('application.update');//Update Patient Data
        Route::get('/{app_id}/delete','delete')->name('application.delete');//Delete Patient Date
    });
############################### Applications ###############################

############################### Departments ###############################

    Route::group(['prefix'=>'department','controller'=>DepartmentController::class],function(){
        Route::get('/all_departments','get_all_departments')->name('all.departments');//Show All Patients
        Route::get('/add','add')->name('department.add');//Return Add Form
        Route::post('/store','store')->name('department.store');//Store Patient in Patient Table
        Route::get('/{dep_id}/edit','edit')->name('department.edit');//Return Edit From
        Route::post('/update','update')->name('department.update');//Update Patient Data
        Route::get('/{dep_id}/delete','delete')->name('department.delete');//Delete Patient Date
    });
############################### Departments ###############################
});
