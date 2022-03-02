<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTempUserEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tempUrl;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->tempUrl = $this->getUrl($user);
    }

    public function getUrl($id)
    {
        return URL::signedRoute(
            'create.account',
            ['tempUser' => $id]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jaspar@bmywa.com', 'BMYWA IT Support')
            ->subject('Complete Your Account')
            ->markdown('mail.send-temp-user-email')
            ->with([
                'url' => $this->tempUrl
            ]);
    }
}
