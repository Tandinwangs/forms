<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $code;
    public $status;
    public $reason;
    
    public function __construct($code,$status,$reason = null)
    {
        $this->code = $code;
        $this->status = $status;
        $this->reason = $reason;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('system-mailer@bnb.bt')
                    ->subject("Status for Form: $this->code")
                    ->view('email.statuschanged')
                    ->text('email.statuschanged_plain');
    }
}
