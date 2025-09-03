<?php

namespace App\services;

use App\Events\CreateNewSubjectEvent;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class CreateNewSubjectService
{
    
    public function __construct()
    {
        //
    }

    public function CreateNewSubjectService($CreateNewSubjectService){
        $created_by = Auth::id();
        $image = time(). "." . $CreateNewSubjectService['imageSubject']->extension();
        $CreateNewSubjectService["imageSubject"]->move(public_path("uploads/images"),$image);
        Subject::create([
            "nameSubject" => $CreateNewSubjectService["nameSubject"],
            "imageSubject"=>$image,
            "descriptionSubject"=>$CreateNewSubjectService['descriptionSubject'],
            "classYear_id" => $CreateNewSubjectService['classYear_id'],
            "department_id"=>$CreateNewSubjectService['department_id'],
            "created_by" => $created_by,
        ]);
        $userData = Auth::user();
        event(new CreateNewSubjectEvent($CreateNewSubjectService , $userData));
    }
}
