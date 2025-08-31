<?php

namespace App\Http\Controllers;

use App\services\CreateNewDepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function PageCreateNewDepartment(){
        return view("Departments.PageCreateNewDepartments");
    }

    public function CreateNewDepartment(Request $request  , CreateNewDepartmentService $CreateNewDepartmentService){
        // $request->validate([
        //     "name" => "required|string",
        //     "description" => "required|string",
        //     "created_by" => "required",
        // ]);
        $CreateNewDepartmentService->create($request->all());
        return back()->with("success","تم انشاء المادة بنجاح");
    }
}
