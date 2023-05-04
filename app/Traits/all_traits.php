<?php

namespace App\Traits;
use Illuminate\Support\Facades\Validator;

trait all_traits
{
    function save_image($request,$path,$input_name){
        $file_path= $path;
        $image = $request->file($input_name);
        $filename = $image->hashName();//hashName using to hash image name
        $request->$input_name->move($file_path,$filename);
        return $filename;
    }

    function validation($request,$rules){
        //Make Validation for inputs
        $validators = Validator::make($request->all(),$rules,$this->messages());
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput($request->all());
        }
    }

    function messages(){
        return $messages = [
            'doc_name.required'=>'Name Is Required',
            'doc_name.unique'=>'The name already exists',
            'doc_position.required'=>'Position is required',
            'doc_image.required'=>'Image is required',
            'doc_gender.required'=>'Gender is required',
        ];
    }
}

?>
