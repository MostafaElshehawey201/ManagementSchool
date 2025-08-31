<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;
use App\services\MailCreateNewStudent;
use App\Factories\CreateNewStudentFactory;

class StudentController extends Controller
{
    public function PageCreateNewStudent(){
        $Teachers = Teacher::all();
        $Departments = Department::all();
        return view("Students.PageCreateNewStudent" ,["Teachers"=>$Teachers , "Departments" => $Departments]);
    }
    public function CreateNewStudent(Request $request , MailCreateNewStudent $MailCreateNewStudent){
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "image"=>"required|image|mimes:png,jpg,jpeg,jifi,ifij",
            "phone" => "required|string",
            "subject_id" => "required",
            "teacher_id" =>"required",
        ]);
        CreateNewStudentFactory::create($request->all());
        $email = $request->email;
        $name = $request->name;
        $MailCreateNewStudent->MailCreateNewStudent($email , $name);
        return back()->with("success" , "تم تسجيل بيانات الطالب بنجاح");
    }

    
}
