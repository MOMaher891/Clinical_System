<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

define('PAGINATION_COUNT',5);
class AdminController extends Controller
{
    public function index(){

        //Doctor
        $doc_count = Doctor::count();
        $doctors = Doctor::orderBy('id', 'desc')->take(PAGINATION_COUNT)->get();
        //Doctor

        //patient
        $pat_count = Patient::count();
        $patients = Patient::orderBy('id', 'desc')->take(PAGINATION_COUNT)->get();
        //patient

        //application
        $app_count = Application::count();
        $applications = Application::with('patient','department')->orderBy('id', 'desc')->take(PAGINATION_COUNT)->get();
        //application

        //application
        $dep_count = Department::count();
        $departments = Department::with('days')->orderBy('id', 'desc')->take(PAGINATION_COUNT)->get();
        //application

        return view('Admin.index',compact('doc_count','pat_count','app_count','dep_count','applications','doctors','patients','departments'));

        // return $applications->patient->pat_name;
    }
}
