<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\MedicalStatment;
use App\Models\Patient;
use Illuminate\Http\Request;

define('PAGINATION_COUNT',5);
class AdminController extends Controller
{
    public function index(){

        //Doctor
        $doc_count = Doctor::count();
        $doctors = Doctor::orderBy('id', 'desc')->paginate(3);
        //Doctor

        //patient
        $pat_count = Patient::count();
        $patients = Patient::orderBy('id', 'desc')->paginate(3);
        //patient

        //application
        $app_count = Application::count();
        $applications = Application::with('patient','department')->orderBy('id', 'desc')->paginate(3);
        //application

        //application
        $dep_count = Department::count();
        $departments = Department::with('days')->orderBy('id', 'desc')->paginate(3);
        //application

        return view('Admin.index',compact('doc_count','pat_count','app_count','dep_count','applications','doctors','patients','departments'));

        // return $applications->patient->pat_name;
    }

    public function all_statements(){
        $statements = MedicalStatment::with('patient','doctor')->paginate(config('app.PAGNATION'));

        // return $statements;
        return view('Admin.statements',compact('statements'));
    }

    public function single_statement($statement_id){
        $statement = MedicalStatment::with(['patient','doctor'=>function($q){
            $q->with('department');
        }])->find($statement_id);
        if(!$statement){
            return redirect()->route('admin.all.statements')->with(['error'=>'No Statement Founded']);
        }
        return view('Admin.single_statement',compact('statement'));
    }
}
