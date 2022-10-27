<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FirstMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mailMessage;

    public function __construct($mailMessage)
    {
        $this->mailMessage = $mailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   return $this->from('ololo@mail.ru', 'Ololo ololo')
        ->to('ololo2@mail.ru')
        ->cc(['ololo3@mail.ru'])
        ->subject('')
        ->markdown('emails.first')
        ->with([
            'message2' => 'sdfsdfsdfsdfds',
            'mailMessage' => $this->mailMessage
        ]);
    }
}
