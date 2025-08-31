<?php

namespace App\services;

use App\Mail\CreateNewStudentMail;
use Illuminate\Support\Facades\Mail;

class MailCreateNewStudent
{
    public function __construct()
    {
        
    }
    public function MailCreateNewStudent($email , $name){
        Mail::to($email)->send(new CreateNewStudentMail($name , "01095766001" ,$email));
    }

}
