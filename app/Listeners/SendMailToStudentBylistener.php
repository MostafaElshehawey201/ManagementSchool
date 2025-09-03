<?php

namespace App\Listeners;

use Twilio\Rest\Client;
use App\Mail\CreateNewStudentMail;
use Illuminate\Support\Facades\Mail;
use App\Events\EventCreateNewStudent;
use App\services\MailCreateNewStudent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\services\smsServiceCreateNewStudent;

class SendMailToStudentBylistener
{
    public $client;
    public function __construct(){
        $this->client = new Client(
            config("services.twilio.sid"),
            config("services.twilio.auth")
        );
    }


    public function handle(EventCreateNewStudent $DataEventCreateNewStudent): void
    {
        $Data = $DataEventCreateNewStudent->requestDataFactory;
        Mail::to($Data['email'])->send(new CreateNewStudentMail(
            $Data['name'] , $Data['phone'] ,$Data['email']
        ));
        
        $to =$Data['phone'];
        $name = $Data["name"];
        $message =$Data['email'];
        $this->client->messages->create($to ,[
            "from" => config("services.twilio.phone"),
            "body" => "مرحبا $name تم انشاء حساب الكتروني علي منصة BioMaster التعليمية يمكنك الدخول الي المنصة من خلال $message والباسورد الخاص بك ستحصل علية من المدرس الخاص بك",
        ]);
    }
}
