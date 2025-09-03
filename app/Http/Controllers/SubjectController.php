<?php

namespace App\Http\Controllers;

use App\Models\ClassYear;
use App\Models\Department;
use App\Models\Teacher;
use App\services\CreateNewSubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function PageCreateNewSubject(){
        // المادة 
        $Departments = Department::all();
        // السنة الدراسية
        $ClassYears = ClassYear::all();
        return view("Subjects.PageCreateNewSubject" ,["Departments"=>$Departments ,'ClassYears'=>$ClassYears]);
    }
    public function CreateNewSubject(Request $request , CreateNewSubjectService $CreateNewSubjectService ){
        // $request->validate([
        //     ""
        // ]);

        $CreateNewSubjectService->CreateNewSubjectService($request->all());
        return back()->with("success" , "تم رفع $request->nameSubject بنجاح");
    }
}
