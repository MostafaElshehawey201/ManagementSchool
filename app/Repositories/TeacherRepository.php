<?php
namespace App\Repositories;

use App\Models\Teacher;

class TeacherRepository {
    public function CreateNewTeacher(array $DataCreateNewTeacher){
        return Teacher::create($DataCreateNewTeacher);
    }
}

?>