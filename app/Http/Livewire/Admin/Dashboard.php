<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entry;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $entries = Entry::latest()
        ->get();

        return view(
            'livewire.admin.dashboard',
            [
                'entries' => $entries->take(5),
                'entries_count' => count($entries)
            ]
        )->layout('layouts.admin');
    }
}
