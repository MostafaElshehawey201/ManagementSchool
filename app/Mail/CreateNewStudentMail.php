<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateNewStudentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name ;
    public $phone ;
    public $email ;
    public function __construct($name , $phone , $email)
    {
        $this->name = $name ;
        $this->phone = $phone;
        $this->email = $email ;
    }

    public function build(){
        return $this->subject("اشعار تسجيل بيانات طالب جديد")->view("emails.CreateNewStudentMail");
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Create New Student Mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
