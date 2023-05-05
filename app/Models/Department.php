<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['id','dep_name','dep_price','dep_rate','dep_image'];
    public $timestamps = false;


    ################################ Relation with application table ################################
    public function applications(){
        return $this->hasMany('App\Models\Application','department_id');
    }
    ################################ Relation with application table ################################

    ################################ Relation with Days table ################################
    public function days(){
        return $this->belongsToMany('App\Models\Day','departments_days','department_id','day_id','id','id');
    }
    ################################ Relation with Days table ################################
    use HasFactory;
}
