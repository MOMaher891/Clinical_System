<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $departments = Department::get();
        $doctors = Doctor::with('department')->get();

        $doc_count = Doctor::count();
        $dep_count = Department::count();
        $app_count = Application::count();
        $pat_count = Patient::count();
        return view('Front.home',compact('departments','doctors','doc_count','dep_count','app_count','pat_count'));
    }

    public function book_specific_department($dep_id){
        // return ;
        $department = Department::find($dep_id);
        return view('Front.book',compact('department'));
    }

    public function book(Request $request){
        $request->validate([
            'pat_name'=>'required',
            'pat_nat_id'=>'required|max:14|min:14',
            'pat_age'=>'required',
            'pat_gender'=>'required'
        ]);

        $patient = Patient::where('pat_nat_id',$request->pat_nat_id)->first();
        if(!$patient){
            Patient::create([
                'pat_name'=>$request->pat_name,
                'pat_nat_id'=>$request->pat_nat_id,
                'pat_age'=>$request->pat_age,
                'pat_gender'=>$request->pat_gender
            ]);
        }

        $patient_id = Patient::where('pat_nat_id',$request->pat_nat_id)->first();

        Application::create([
            'app_code'=>rand(1,1000),
            'patient_id'=>$patient_id->id,
            'department_id'=>$request->department_id
        ]);

        return redirect()->route('home')->with(['success'=>'Booking Success']);
    }
}
