<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailContestant extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $msgData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->msgData = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->msgData['fromAddress'], $this->msgData['fromName'])
            ->cc('')
            ->subject($this->msgData['subject'])
            ->markdown('mail.admin.email-contestant')
            ->with([
                'email' => $this->msgData
            ]);
    }
}
