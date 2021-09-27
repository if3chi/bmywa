<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubmissionRecieved extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $contestant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contestant)
    {
        $this->contestant = [
            'lastname' => $contestant->lastname,
            'entryTempUrl' => $this->getTempUrl($contestant->id),
            'closeDate' => entrySchedule('closeDate'),
            'awardDate' => entrySchedule('awardDate'),
        ];
    }

    public function getTempUrl(int $entryId)
    {
        return URL::temporarySignedRoute(
            'preview.entry',
            now()->addHours(72),
            ['entry' => $entryId]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@bmywa.com', 'BMYWA')
            ->markdown('emails.submission.recieved')
            ->with(['contestant' => $this->contestant]);
    }
}
