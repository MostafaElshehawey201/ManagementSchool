<?php

namespace App\services;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class CreateNewDepartmentService
{
    
    public function __construct()
    {

    }
    public function create($requestDataDepartment){
        $created_by = Auth::id();
        if($requestDataDepartment["image"]){
            $image =time(). "." .$requestDataDepartment["image"]->extension();
            $requestDataDepartment["image"]->move(public_path("uploads/images") , $image);
        }
        Department::create([
            "name" =>$requestDataDepartment["name"],
            "description" => $requestDataDepartment["description"],
            "image" => $image ,
            "created_by" =>$created_by ,
        ]);
    }
}
