<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{


    ################################ Relation with Department table ################################
    public function departments(){
        return $this->belongsToMany('App\Models\Department','departments_days','day_id','department_id','id','id');
    }
    ################################ Relation with Department table ################################
    use HasFactory;
}
