<?php

namespace App\services;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeacherServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function CreateNewTeacherService($requestData){
        $teacher = User::create([
            "name" => $requestData['name'],
            "email" => $requestData['email'],
            "password" => bcrypt("123654789"),
            "role"=>"teacher",
        ]);
        $teacher_id = $teacher->id; 
        $created_by = Auth::id();
        $image = time(). "." . $requestData["image"]->extension();
        $requestData['image']->move(public_path("uploads/images") ,$image);
        if($requestData){
            Teacher::create([
                "name" => $requestData['name'],
                "image"=>$image,
                "phone" => $requestData['phone'],
                "department_id"=>$requestData['department_id'],
                "address" =>$requestData['address'],
                "salary"=>$requestData['salary'],
                "teacher_id"=>$teacher_id,
                "created_by"=>$created_by,
            ]);
        }
    }
}
