<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
        "name" , "email" , "phone", "image" , "subject_id" , "teacher_id" , "address", "degree",
    ];

    // public function Subject(){
    //     return $this->belongsTo(Department::class);
    // }

    public function Teacher(){
        return $this->belongsTo(User::class);
    }
}
