<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Traits\all_traits;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use all_traits;
######################## Show Doctors ########################

    public function get_all_doctors(Request $request){
        // make Filter For Doctors

        $doctors = Doctor::query();

        if($request->gender)
        {
            $doctors = $doctors->where('doc_gender',$request->gender);
        }

        $doctors = $doctors->paginate(config('app.PAGNATION'));

        return view('Admin.Doctors.index',compact('doctors'));
    }
######################## Show Doctors ########################


######################## ADD Doctor ########################
    public function add(){
        return view('Admin.Doctors.add');
    }

    public function store(Request $request){
        //Make Validations
        $validation = $this->validation($request,$this->add_doctor_rules());
        if($validation){
            return $validation;
        }
        $image =$this->save_image($request , 'Admin/Images/Doctors','doc_image');
        Doctor::create([
            'doc_name'=>$request->doc_name,
            'doc_position'=>$request->doc_position,
            'doc_image'=>$image,
            'doc_gender'=>$request->doc_gender
        ]);
        return redirect()->route('all.doctors')->with(['success'=>'Doctor Added Successfully']);
    }
######################## ADD Doctor ########################


######################## Update Doctor ########################
    public function edit($doc_id){
        $doctor = Doctor::find($doc_id);
        if(!$doctor){
            return redirect()->route('all.doctors')->with(['error'=>'Doctor Not Founded']);
        }
        return view('Admin.Doctors.edit',compact('doctor'));
    }

    public function update(Request $request){
        $validation = $this->validation($request,$this->update_doctor_rules());
        if($validation){
            return $validation;
        }
        $image =$this->save_image($request , 'Admin/Images/Doctors','doc_image');
        Doctor::find($request->id)->update([
            'doc_name'=>$request->doc_name,
            'doc_position'=>$request->doc_position,
            'doc_image'=>$image,
            'doc_gender'=>$request->doc_gender
        ]);
        return redirect()->route('all.doctors')->with(['success'=>'Doctor Updated Successfully']);
    }
######################## Update Doctor ########################

######################## Delete Doctor ########################
    public function delete($doc_id){
        $doctor = Doctor::find($doc_id);
        if(!$doctor){
            return redirect()->route('all.doctors')->with(['error'=>'Doctor Not Founded']);
        }
        $doctor->delete();
        return redirect()->route('all.doctors')->with(['success'=>'Doctor Deleted Successfully']);
    }
######################## Delete Doctor ########################



######################## Rules ############################

    protected function add_doctor_rules(){
        return $rules = [
            'doc_name'=>'required|unique:doctors,doc_name',
            'doc_position'=>'required',
            'doc_image'=>'required',
            'doc_gender'=>'required'
        ];
    }
    protected function update_doctor_rules(){
        return $rules = [
            'doc_name'=>'required',
            'doc_position'=>'required',
            'doc_image'=>'required',
            'doc_gender'=>'required'
        ];
    }

######################## Rules ############################

}
