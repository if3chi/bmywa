<?php

namespace App\Actions\Entry;

use App\Actions\Entry\SaveEntry;
use App\Actions\Entry\SendNewEntryMail;

class ProcessEntry
{

    /**
     * Process Entry and Send Mail
     *
     * @param array $entry
     * @return void
     */
    public function __invoke(array $entry): array
    {
        if (!entryIsActive()) {
            return [
                'title' => 'Submission Invalid',
                'body' => 'We\'re currently not accepting submissions at the moment.
                    Kindly check the dates.',
                'type' => 'danger'
            ];
        }

        $savedEntry = (new SaveEntry)($entry);
        (new SendNewEntryMail)($savedEntry);

        return [
            'title' => 'Entry Submitted',
            'body' => 'Kindly Check the email you provided for more details.'
        ];
    }
}
