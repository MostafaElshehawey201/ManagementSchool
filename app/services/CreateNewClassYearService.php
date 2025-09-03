<?php

namespace App\services;

use App\Models\ClassYear;

class CreateNewClassYearService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }

    public function CreateNewClassYearService($requestDataClassYear){
        $image = time(). "." .$requestDataClassYear['image']->extension();
        $requestDataClassYear['image']->move(public_path("uploads\images"),$image);
        ClassYear::create([
            "ClassYearName" => $requestDataClassYear['ClassYearName'],
            "ClassYearImage" => $image,
            "ClassYearDescription"=>$requestDataClassYear['ClassYearDescription'],
        ]);
    }
}
