<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\MedicalStatment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    //
    public function index()
    {
        $patients = Patient::all();
        return view('Doctors.index',['patients'=>$patients]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'patient_id'=>'required',
            'note'=>'required'
        ]);

        MedicalStatment::create(
            [
                'patient_id'=>$request->patient_id,
                'note'=>$request->note,
                'doctor_id'=>auth()->user()->id
            ]
            );

        return redirect()->back()->with(['success'=>'Added']);
    }

    public function all_statements(){
        $statements = MedicalStatment::where('doctor_id',Auth::guard('doctor')->user()->id)->with('patient','doctor')->paginate(config('app.PAGNATION'));
        $patients = Patient::all();
        // return $statements;
        return view('Doctors.statements',compact('statements','patients'));
    }

    public function doctor_profile($doc_id){
        $doctor = Doctor::with('department')->find($doc_id);
        return view('Doctors.doctor_profile',compact('doctor'));
    }

}
