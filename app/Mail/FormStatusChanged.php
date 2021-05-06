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
    public $form;

    public function __construct($form)
    {
        $this->form = $form;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('system-mailer@bnb.bt')
                    ->subject("Status for Form Submitted Online to Bhutan National Bank Limited")
                    ->view('email.statuschanged')
                    ->text('email.statuschanged_plain');
    }
}
