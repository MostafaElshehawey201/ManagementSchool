<?php

namespace App\Listeners;

use App\Mail\CreateNewStudentMail;
use Illuminate\Support\Facades\Mail;
use App\Events\EventCreateNewStudent;
use App\services\MailCreateNewStudent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\services\smsServiceCreateNewStudent;

class SendMailToStudentBylistener
{
    protected $twilioSms;

    public function __construct(smsServiceCreateNewStudent $smsServiceCreateNewStudent){
        $this->twilioSms = $smsServiceCreateNewStudent;
    }


    public function handle(EventCreateNewStudent $DataEventCreateNewStudent): void
    {
        $Data = $DataEventCreateNewStudent->requestDataFactory;
        Mail::to($Data['email'])->send(new CreateNewStudentMail(
            $Data['name'] , $Data['phone'] ,$Data['email']
        ));

        $this->twilioSms->SendSms(
            $Data["phone"],
            "مرحبا يمكنك التواصل معنا من خلال ". $Data["email"]
        );
    }
}
