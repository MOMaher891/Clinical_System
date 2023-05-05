<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Department;
use App\Models\Patient;
use App\Traits\all_traits;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    use all_traits;
    public function get_all_applications(){
        $applications =  Application::with('department','patient')->paginate(5);

        return view('Admin.Applications.index',compact('applications'));
    }

    public function edit($app_id){
        $application = Application::with('department')->find($app_id);
        $departments = Department::get();
        $patients = Patient::get();
        // return $application;
        return view('Admin.Applications.edit',compact('application','departments','patients'));
    }

    public function update(Request $request){
        $request->validate([
            'created_at'=>'required'
        ]);
        // return $request;
        Application::find($request->id)->update([
            'created_at'=>$request->created_at,
            'department_id'=>$request->department_id,
            'patient_id'=>$request->patient_id
        ]);
        return redirect()->route('all.applications')->with(['success'=>'Application Updated Successfully']);
    }

    public function delete($app_id){
        $application = Application::find($app_id);
        if(!$application){
            return redirect()->route('all.applications')->with(['error'=>'Application Not Found']);
        }
        $application->delete();
        return redirect()->route('all.applications')->with(['success'=>'Application Deleted Successfully']);
    }
}
