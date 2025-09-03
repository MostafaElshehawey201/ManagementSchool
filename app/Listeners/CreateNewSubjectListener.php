<?php

namespace App\Listeners;

use App\Models\Student;
use Twilio\Rest\Client;
use App\Mail\CreateNewSubjectMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Events\CreateNewSubjectEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateNewSubjectListener
{
    public $client ;
    public function __construct()
    { 
      $this->client = new Client(
        config("services.twilio.sid"),
        config("services.twilio.auth"),
      );
    }

    public function handle(CreateNewSubjectEvent $event): void
    {
        $CreateNewSubjectService = $event->CreateNewSubjectService;
        $userData = $event->userData;
        Mail::to($userData['email'])->send(new CreateNewSubjectMail(
        $CreateNewSubjectService['nameSubject'] , $CreateNewSubjectService['descriptionSubject']
        ));

        // $studentData = Student::pluck("phone");
        // $studentData->where("teacher_id" , $userData->id);
        // dd($studentData);

        // $phones = DB::table("students")->pluck('phone')->toArray();
        // dd($phones);

        $to = "+201095766001";
        $body = $userData['email'];
        $this->client->messages->create($to , [
            "from" => config("services.twilio.phone"),
            "body" => "تم رفع شرح جديد لك و يمكنك التواصل مع المدرس الخاص بك من خلال $body" ,
        ]);
    }
}
