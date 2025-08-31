<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use App\services\TeacherServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function PageCreateNewTeacher()
    {
        $Departments = Department::all();
        return view("Teachers.PageCreateNewTeacher" , ["Departments" =>$Departments]);
    }

    // public function CreateNewTeacher(Request $request)
    // {
    //     $request->validate([
    //         "name" => "required|string",
    //         "email" => "required|email",
    //         "image" => "required|image|mimes:png,jpg,jpeg,jifi,ifij",
    //         "phone" => "required|max:13|min:11",
    //         "address" => "required",
    //         "salary" => "required",
    //         "department_id" => "required",
    //     ]);
    //     $user = User::create([
    //         "name" => $request->name,
    //         "email" => $request->email,
    //         "password" => bcrypt("123654789"),
    //     ]);
    //     $teacher_id = $user->id;
    //     $created_by = Auth::id();
    //     if ($request->hasFile("image")) {
    //         $image = time() . "." . $request->file("image")->extension();
    //         $request->file("image")->move(public_path("uploads/images"), $image);
    //     }

    //     if ($request) {
    //         Teacher::create([
    //             "name" => $request->name,
    //             "image" => $image,
    //             "phone" => $request->phone,
    //             "address" => $request->address,
    //             "salary" => $request->salary,
    //             "department_id" => $request->department_id,
    //             "teacher_id" => $teacher_id,
    //             "created_by" => $created_by,
    //         ]);
    //         return back()->with("success", "تم تخزين بيانات المعلم بنجاح");
    //     } else {
    //         return back()->with("error", "لم نتمكن من تخزين بيانات المعلم");
    //     }
    // }

    public function CreateNewTeacher(Request $request , TeacherServices $teacherService){
        $request->validate([
            "name" =>"required|string",
            "image" => "required|image|mimes:png,jpg,jpeg,jifi,ifij",
            "phone" =>"required|string|min:11|max:13",
            "address" => "required|string",
            "salary" => "required|string",
            "department_id"=>"required",
        ]);
        $teacherService->CreateNewTeacherService($request->all());  
        return back()->with("success", "تم تخزين بيانات المعلم بنجاح");
    }

}
