<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationComment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data = [] ;

    public function __construct($request, $expired, $id, $selector)
    {
        $this->data['requests'] = $request;
        $this->data['expired'] = $expired;
        $this->data['id'] = $id;
        $this->data['selector'] = $selector;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.verifications');
    }
}
