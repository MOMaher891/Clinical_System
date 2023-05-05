<?php

namespace App\Http\Controllers;

use App\Export\PatientExport;
use App\Models\Patient;
use App\Traits\all_traits;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PatientController extends Controller
{
    use all_traits;
######################## Show Patients ########################

    public function get_all_patients(){
        $patients = Patient::paginate(5);
        return view('Admin.Patients.index',compact('patients'));
    }

######################## Show Patients ########################

######################## Show Application for specific patient ########################

    public function get_all_applications_for_specific_patient($pat_id){
        $patient = Patient::with('applications')->find($pat_id);

        return view('Admin.Patients.specific_applications',compact('patient'));
    }

######################## Show Application for specific patient ########################



######################## ADD Patient ########################
    public function add(){
        return view('Admin.Patients.add');
    }

    public function store(Request $request){
        //Make Validations
        $validation = $this->validation($request,$this->add_patient_rules());
        if($validation){
            return $validation;
        }
        Patient::create([
            'pat_name'=>$request->pat_name,
            'pat_nat_id'=>$request->pat_nat_id,
            'pat_age'=>$request->pat_age,
            'pat_gender'=>$request->pat_gender
        ]);
        return redirect()->route('all.patients')->with(['success'=>'Patient Added Successfully']);
    }
######################## ADD Patient ########################


######################## Update Patient ########################
    public function edit($pat_id){
        $patient = patient::find($pat_id);
        if(!$patient){
            return redirect()->route('all.patients')->with(['error'=>'Patient Not Founded']);
        }
        return view('Admin.Patients.edit',compact('patient'));
    }

    public function update(Request $request){
        $validation = $this->validation($request,$this->update_patient_rules());
        if($validation){
            return $validation;
        }
        Patient::find($request->id)->update([
            'pat_name'=>$request->pat_name,
            'pat_nat_id'=>$request->pat_nat_id,
            'pat_age'=>$request->pat_age,
            'pat_gender'=>$request->pat_gender
        ]);
        return redirect()->route('all.patients')->with(['success'=>'Patient Updated Successfully']);
    }
######################## Update Patient ########################

######################## Delete Patient ########################
    public function delete($pat_id){
        $patient = Patient::with('applications')->find($pat_id);
        if(!$patient){
            return redirect()->route('all.patients')->with(['error'=>'Patient Not Founded']);
        }
        $patient->applications()->delete();
        $patient->delete();
        return redirect()->route('all.patients')->with(['success'=>'Patient Deleted Successfully']);
    }
######################## Delete Patient ########################

// Export Patient Excel Sheet 
public function export()
{
    return Excel::download(new PatientExport, 'patient.xlsx');
}

######################## Rules ############################

    protected function add_patient_rules(){
        return $rules = [
            'pat_name'=>'required',
            'pat_gender'=>'required',
            'pat_nat_id'=>'required|unique:Patients,pat_nat_id|max:14|min:14',
            'pat_age'=>'required'
        ];
    }
    protected function update_patient_rules(){
        return $rules = [
            'pat_name'=>'required',
            'pat_gender'=>'required',
            'pat_nat_id'=>'required|max:14|min:14',
            'pat_age'=>'required'
        ];
    }

######################## Rules ############################
}
 