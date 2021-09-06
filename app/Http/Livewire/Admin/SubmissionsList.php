<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entry;
use Livewire\Component;

class SubmissionsList extends Component
{
    public $detailView;
    public $activeEntry;

    public function openEntry(Entry $entry)
    {
        $this->activeEntry = $entry->id;
        $this->detailView = $entry;
    }

    public function render()
    {
        return view('livewire.admin.submissions-list', [
            'entries' => Entry::latest()->get()
        ])->layout('layouts.admin');
    }
}
