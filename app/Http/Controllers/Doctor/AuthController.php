<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function loginView()
    {
        return view('Doctors.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);
        // return $request->all();

        if(Auth::guard('doctor')->attempt(['email' => $request->email, 'password' =>$request->password]))
        {
            return redirect(route('doctor.home'));
        }else{
            return redirect()->back()->with('error','Invaild Email or Password');
        }
    }

}
