<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassYear extends Model
{
    protected $fillable=[
        "ClassYearName" , "ClassYearImage" , "ClassYearDescription" , 
    ];

    public function Subjects(){
        return $this->hasMany(Subject::class);
    }
}
