<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable =[
        "nameSubject" , "imageSubject" , "descriptionSubject" , "classYear_id" , "created_by" ,"department_id" ,  
    ];

    public function ClassYear(){
        return $this->belongsTo(ClassYear::class);
    }

    public function Department(){
        return $this->belongsTo(Department::class);
    }
}
