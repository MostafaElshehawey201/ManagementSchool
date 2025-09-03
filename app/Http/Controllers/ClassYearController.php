<?php

namespace App\Http\Controllers;

use App\services\CreateNewClassYearService;
use Illuminate\Http\Request;

class ClassYearController extends Controller
{
    public function PageCreateClassYear(){
        return view("ClassYears.PageCreateNewClassYear");
    }

    public function CreateNewClassYear(Request $request ,CreateNewClassYearService $CreateNewClassYearService){
        $request->validate([
            "ClassYearName" => "required|string",
            "ClassYearImage" => "required",
            "ClassYearDescription"=>"required|string",
        ]);
        $CreateNewClassYearService->CreateNewClassYearService($request->all());
        return back()->with("success" , "تم رفع الشرح بنجاح");
    }
}
