<?php

namespace App\services;

use Twilio\Rest\Client;

class smsServiceCreateNewStudent
{
    protected $client ;
    protected $from ; 
    public function __construct()
    {
        $this->client = new Client(
            config("services.twilio.sid"),
            config("services.twilio.auth"),
        );
        $this->from = config("services.twilio.phone");
    }

    public function SendSms($to , $message){
        return $this->client->messages->create($to , [
            "from" => $this->from,
            "body" => $message,
        ]);
    }
}
