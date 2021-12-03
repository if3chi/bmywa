<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewEntrySubmitted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $emailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $salute = ['Hi', 'Hello'];

        $this->emailData =
            [
                'name' => "$data->firstname $data->lastname",
                'country' => entryCountry()[$data->country],
                'salute' => $salute[array_rand($salute)],
                'url' => $this->getUrl($data->id),
                'login' => route('submissions.index')
            ];
    }

    public function getUrl($id)
    {
        return URL::temporarySignedRoute(
            'preview.entry',
            now()->addHours(72),
            ['entry' => $id]
        );
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@bmywa.com', 'BMYWA Submissions')
            ->markdown('emails.admin.entry-submitted')
            ->with(['details' => $this->emailData]);
    }
}
