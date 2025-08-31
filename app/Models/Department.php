<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
        "name" , "image" , "description" , "created_by"
    ];

    public function CreatedBy(){
        return $this->belongsTo(User::class);
    } 
}
