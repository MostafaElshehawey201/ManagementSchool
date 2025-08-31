<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(DepartmentController::class)->group(function(){
    Route::get("PageCreateNewDepartment" , "PageCreateNewDepartment")->name("PageCreateNewDepartment");
    Route::any("CreateNewDepartment" ,"CreateNewDepartment")->name("CreateNewDepartment");
});

Route::controller(TeacherController::class)->group(function(){
    Route::get("PageCreateNewTeacher" , "PageCreateNewTeacher")->name("PageCreateNewTeacher");
    Route::any("CreateNewTeacher" , "CreateNewTeacher")->name("CreateNewTeacher");
});

Route::controller(StudentController::class)->group(function(){
    Route::get("PageCreateNewStudent" , "PageCreateNewStudent")->name("PageCreateNewStudent");
    Route::any("CreateNewStudent" ,"CreateNewStudent")->name("CreateNewStudent");
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
