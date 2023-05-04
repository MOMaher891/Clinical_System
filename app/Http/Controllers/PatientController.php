<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function get_all_patients(){
        return Patient::with('applications')->get();
    }
}
