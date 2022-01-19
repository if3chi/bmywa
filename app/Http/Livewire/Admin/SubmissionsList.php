<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entry;
use Livewire\Component;

class SubmissionsList extends Component
{
    public $readingView;
    public $activeEntry;

    public function openEntry(Entry $entry)
    {
        $this->activeEntry = $entry->id;
        $this->readingView = $entry;
    }

    public function render()
    {
        return view('livewire.admin.submissions-list', [
            'entries' => Entry::latest()->get()
        ])->layout('layouts.admin');
    }
}
