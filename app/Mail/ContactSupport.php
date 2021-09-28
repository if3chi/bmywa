<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSupport extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected array $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->mailData = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name =  $this->mailData['last_name'] . " " . $this->mailData['last_name'];
        $address = $this->mailData['email'];
        $subject = $this->mailData['subject'];

        return $this->from($address, $name)
            ->subject($subject)
            ->replyTo($address, $name)
            ->view('emails.contact-support')
            ->with([
                'name' => $name,
                'phone' => $this->mailData['phone'],
                'body' => $this->mailData['message'],
            ]);
    }
}
