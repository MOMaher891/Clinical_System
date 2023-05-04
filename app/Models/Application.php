<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['id','pat_name','pat_gender'];
    public $timestamps = false;

    ################################ Relation with patient table ################################
    public function patient(){
        return $this->belongsTo('App\Models\Patient','patient_id');
    }
    ################################ Relation with patient table ################################
    use HasFactory;
}
