<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entry;
use App\Models\Visitor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public function render()
    {
        $entries = Entry::latest()
            ->get();


        $visitors = collect(Visitor::select('visit_date', DB::raw('count(*) as total_today'))->where('visit_date', '>', today()->subMonth())->groupBy('visit_date')->get());

        return view('livewire.admin.dashboard',
            [
                'entries' => $entries->take(5),
                'entries_count' => count($entries),
                'total_visits_today' => $visitors->last()->visit_date === date('Y-m-d') ? $visitors->last()->total_today : 0,
                'total_visits' => count($visitors)
            ]
        )->layout('layouts.admin');
    }
}
