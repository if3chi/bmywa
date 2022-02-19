<?php

namespace App\Actions\Entry;

use App\Models\Entry;

class SaveEntry
{
    /**
     * Save Entry
     *
     * @param array $data
     * @return Entry
     */
    public function __invoke(array $data): Entry
    {
        $data['award_entry'] = textNl2br($data['award_entry']);

        return Entry::create($data);
    }
}
