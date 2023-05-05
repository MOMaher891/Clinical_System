<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Department;
use App\Traits\all_traits;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use all_traits;
######################## Show Departments ########################

    public function get_all_departments(){
        $departments = Department::with('days')->paginate(5);
        return view('Admin.Departments.index',compact('departments'));
    }
######################## Show Departments ########################


######################## ADD Doctor ########################
    public function add(){
        $days = Day::get();
        return view('Admin.Departments.add',compact('days'));
    }

    public function store(Request $request){
        //Make Validations
        $validation = $this->validation($request,$this->add_department_rules());
        if($validation){
            return $validation;
        }
        $image =$this->save_image($request , 'Admin/Images/Departments','dep_image');
        Department::create([
            'dep_name'=>$request->dep_name,
            'dep_price'=>$request->dep_price,
            'dep_image'=>$image,
            'dep_rate'=>$request->dep_rate,
        ]);
        $department = Department::latest()->first();
        $department->days()->syncWithoutDetaching($request->day_id);//Check if data is found or not (add news , not duplicate old)
        return redirect()->route('all.departments')->with(['success'=>'Department Added Successfully']);
    }
######################## ADD Doctor ########################


######################## Update Doctor ########################
    public function edit($dep_id){
        $days = Day::get();
        $department = Department::with('days')->find($dep_id);
        if(!$department){
            return redirect()->route('all.departments')->with(['error'=>'Department Not Founded']);
        }

        return view('Admin.Departments.edit',compact('department','days'));
    }

    public function update(Request $request){
        $validation = $this->validation($request,$this->update_department_rules());
        if($validation){
            return $validation;
        }
        $image =$this->save_image($request , 'Admin/Images/Departments','dep_image');
        Department::find($request->id)->update([
            'dep_name'=>$request->dep_name,
            'dep_price'=>$request->dep_price,
            'dep_image'=>$image,
            'dep_rate'=>$request->dep_rate,
        ]);
        $department = Department::find($request->id);
        $department->days()->syncWithoutDetaching($request->day_id);//Check if data is found or not (add news , not duplicate old)
        return redirect()->route('all.departments')->with(['success'=>'Department Updated Successfully']);
    }
######################## Update Doctor ########################

######################## Delete Doctor ########################
    public function delete($dep_id){
        $department = Department::with('applications')->find($dep_id);
        if(!$department){
            return redirect()->route('all.departments')->with(['error'=>'Departments Not Founded']);
        }

        $department->applications()->delete();
        $department->delete();
        return redirect()->route('all.departments')->with(['success'=>'Department Deleted Successfully']);
    }
######################## Delete Doctor ########################



######################## Rules ############################

    protected function add_department_rules(){
        return $rules = [
            'dep_name'=>'required|unique:departments,dep_name',
            'dep_price'=>'required',
            'dep_image'=>'required',
            'dep_rate'=>'required'
        ];
    }
    protected function update_department_rules(){
        return $rules = [
            'dep_name'=>'required',
            'dep_price'=>'required',
            'dep_image'=>'required',
            'dep_rate'=>'required'
        ];
    }

######################## Rules ############################

}
