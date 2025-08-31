<?php
namespace App\Factories;

use App\Models\Student;
use App\Models\User;

    class CreateNewStudentFactory{
        public static function create($requestDataFactory){
            $user = User::create([
                "name"=>$requestDataFactory['name'],
                "email"=>$requestDataFactory['email'],
                "password" => bcrypt("123654789"),
                "role"=>"student",
            ]);

            if($requestDataFactory["image"]){
                $image =time(). "." . $requestDataFactory['image']->extension();
                $requestDataFactory["image"]->move(public_path("uploads/images") , $image);
            }

            if($requestDataFactory){
                Student::create([
                    "name"=>$requestDataFactory['name'],
                    "email"=>$requestDataFactory["email"],
                    "image"=>$image,
                    "phone"=>$requestDataFactory['phone'],
                    "subject_id"=>$requestDataFactory['subject_id'],
                    "teacher_id"=>$requestDataFactory['teacher_id'],
                    "address"=>$requestDataFactory["address"],
                    "degree"=>$requestDataFactory['degree'],
                ]);
            }
        }
    }
?>