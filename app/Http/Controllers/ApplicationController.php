<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Department;
use App\Models\Patient;
use App\Traits\all_traits;
use Illuminate\Http\Request;

// define('PAGINATION_COUNT',5);

class ApplicationController extends Controller
{

    use all_traits;
    public function get_all_applications(Request $request){

        $applications =  Application::query()->with('department','patient');

        // select from  application ,departiment , patient

        if(isset($request->patient_id))
        {

            $applications->where('patient_id',$request->patient_id);
            // select from  application ,departiment , patient  where patient = ?

        }

        if(isset( $request->department_id))
        {
            $applications->where('department_id',$request->department_id);
            // select from  application ,departiment , patient  where patient = ? and where department = ?

        }

        if(isset( $request->time_from) && isset($request->time_to))
        {
            $applications->whereBetween('created_at',[$request->time_from,$request->time_to]);

            // select from  application ,departiment , patient  where patient = ? and where department = ? and create_at beteween ? and ?

        }


        $applications = $applications->paginate(config('app.PAGNATION'));

        $patients = Patient::all();
        $departments = Department::all();

        return view('Admin.Applications.index',compact('applications','patients','departments'));
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
