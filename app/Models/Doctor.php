<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['id','doc_name','doc_position','doc_image','doc_gender'];
    public $timestamps = false;

    ################################ Handel Doctor Gender ################################
    public function getDocGenderAttribute($g)
    {
        return $g == 0 ? 'Male':'Female';
    }
    ################################ Handel Doctor Gender ################################
    use HasFactory;
}
