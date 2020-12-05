<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tries = 5;
    public $timeout = 30;

    public $subject;
    public $name;
    public $email;
    public $messageBody;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $name, $email, $message)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        $this->messageBody = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
            ->subject($this->subject)
            ->view('emails.contact');
    }
}
