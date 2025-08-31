<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable =[                                           //users     //users
        "name" , "image" , "phone" , "address" , "salary", "department_id" , "teacher_id" ,"created_by", 
    ];



    //get data admin that added data teacher
    public function TeacherCreatedBy(){
        return $this->belongsTo(User::class);
    }

    //get data teacher from table users
    public function DataAdmin(){
        return $this->belongsTo(User::class);
    }
    
}
