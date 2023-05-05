<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalStatment extends Model
{
    use HasFactory;
    protected $table ='medical_statements';
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'note'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
