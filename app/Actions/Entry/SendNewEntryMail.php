<?php

namespace App\Actions\Entry;

use App\Mail\NewEntrySubmitted;
use App\Mail\SubmissionRecieved;
use Illuminate\Support\Facades\Mail;


class SendNewEntryMail
{
    /**
     * Send Mails
     *
     * @param mix $percel
     * @return void
     */
    public function __invoke($percel): void
    {
        Mail::to($percel->email)
            ->queue(new SubmissionRecieved($percel));


        // TODO: Use Notifications
        foreach (getAdminEmails() as $email) {
            Mail::to($email)->queue(new NewEntrySubmitted($percel));
        }
    }
}
