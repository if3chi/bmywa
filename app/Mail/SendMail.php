<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $recipient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('thelmaofosuasamoah@bmywa.com', 'Thelma Ofosu-Asamoah')
            ->subject('BMYWA Judging Panel')
            ->markdown('mail.send-mail')
            ->attach(asset("docs/grading_criteria.pdf"), [
                'as' => 'Grading Criteria.pdf',
                'mime' => 'application/pdf',
            ])
            ->with([
                'recipient' => $this->recipient
            ]);
    }
}
