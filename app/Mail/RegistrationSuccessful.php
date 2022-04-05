<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationSuccessful extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@bmywa.com', 'BMYWA Admins')
            ->markdown('mail.registration-successful')
            ->attach(asset("docs/grading_criteria.pdf"), [
                'as' => 'Grading Criteria.pdf',
                'mime' => 'application/pdf',
            ])
            ->with([
                'name' => $this->name
            ]);
    }
}
