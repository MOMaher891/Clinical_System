<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\MedicalStatment;
use App\Models\Patient;
use Illuminate\Http\Request;

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



}
