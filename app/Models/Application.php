<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['id','patient_id','department_id','created_at','app_code'];
    public $timestamps = false;

    ################################ Relation with patient table ################################
    public function patient(){
        return $this->belongsTo('App\Models\Patient','patient_id');
    }
    ################################ Relation with patient table ################################

    ################################ Relation with department table ################################
    public function department(){
        return $this->belongsTo('App\Models\Department','department_id');
    }
    ################################ Relation with department table ################################
    use HasFactory;
}
