<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class InfoBanner extends Component
{
    public $open = false;

    public function mount()
    {
        $this->open = Session::has('announcement')
            ? Session::get('announcement') : true;
    }

    public function closeInfo(bool $link = false)
    {
        Session::put('announcement', false);
        if ($link) {
            return redirect()->route('events');
        }
    }

    public function render()
    {
        return view('livewire.front.info-banner')->layout('layouts.front');;
    }
}
