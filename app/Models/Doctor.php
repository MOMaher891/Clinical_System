<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatables;
class Doctor extends Authenticatables
{
    use HasFactory, Notifiable;
    protected $fillable = ['id','doc_name','doc_image','doc_gender','department_id','email','password'];
    public $timestamps = false;

    ################################ Handel Doctor Gender ################################
    public function getDocGenderAttribute($g)
    {
        return $g == 0 ? 'Male':'Female';
    }
    ################################ Handel Doctor Gender ################################

    /**
    * realtion between doc and dep
    *
    */

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function statements()
    {
        return $this->hasMany(MedicalStatment::class,'doctor_id');
    }





    use HasFactory;
}
