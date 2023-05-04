<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['id','pat_name','pat_gender'];
    public $timestamps = false;

    ################################ Handel Doctor Gender ################################
    public function getPatGenderAttribute($g)
    {
        return $g == 0 ? 'Male':'Female';
    }
    ################################ Handel Doctor Gender ################################

    ################################ Relation with Application table ################################
    public function applications(){
        return $this->hasMany('App\Models\Application','patient_id');
    }
    ################################ Relation with Application table ################################
    use HasFactory;
}
