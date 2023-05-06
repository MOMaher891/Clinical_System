<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $departments = Department::get();
        return view('Front.home',compact('departments'));
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

        $patient = Patient::where('pat_nat_id',$request->pat_nat_id)->get();
        if(!$patient){
            Patient::create([
                'pat_name'=>$request->pat_name,
                'pat_nat_id'=>$request->pat_nat_id,
                'pat_age'=>$request->pat_age,
                'pat_gender'=>$request->pat_gender
            ]);
        }


        Application::create([
            'app_code'=>rand(1,1000),
            'patient_id'=>Patient::where('pat_nat_id',$request->pat_nat_id)->get('id')->value(),
            'department_id'=>$request->department_id
        ]);

        return redirect()->route('home')->with(['success'=>'Booking Success']);
    }
}
