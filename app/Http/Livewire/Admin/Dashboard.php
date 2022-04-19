<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Entry, Visitor};
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public function render()
    {
        $entries = Entry::latest()
            ->get();

        $visitors = Visitor::select('visit_date', DB::raw('count(*) as total_today'))->where('visit_date', '>', today()->subMonth())->groupBy('visit_date')->get();
        $monthly_visits = Visitor::select('visit_date')->where('visit_date', '>', today()->subMonth())->count();

        return view('livewire.admin.dashboard',
            [
                'entries' => $entries->take(5),
                'entries_count' => count($entries),
                'total_visits_today' => count($visitors) > 0 && collect($visitors)->last()->visit_date === date('Y-m-d') ? $visitors->last()->total_today : 0,
                'total_visits' => $monthly_visits
            ]
        )->layout('layouts.admin');
    }
}
