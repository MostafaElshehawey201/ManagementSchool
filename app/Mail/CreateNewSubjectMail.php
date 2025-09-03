<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateNewSubjectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nameSubject ;
    public $descriptionSubject;
    public function __construct($nameSubject ,$descriptionSubject )
    {
        $this->nameSubject =$nameSubject ;
        $this->descriptionSubject = $descriptionSubject ;
    }

    public function build(){
        return $this->subject("تم رفع الفيديو بنجاح")->view("emails.CreateNewSubject");
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Create New Subject Mail',
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
