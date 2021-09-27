<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class SelectCountry extends Component
{
    public function switchCountry($code)
    {
        $this->emit('setCountry', $code);
        $this->flashalert([
            'title' => "Country set to ".entryCountry($code),
        ]);
    }

    public function render()
    {
        return view('livewire.front.select-country');
    }
}
