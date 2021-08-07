<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;
use App\Http\Livewire\Traits\EntryHelper;

class EntryForm extends Component
{
    use EntryHelper;

    public $country;
    public Entry $editing;

    protected $listeners  = ['saved' => 'mount'];

    public function mount()
    {
        $this->country = 'gh';
        $this->editing = Entry::make(['entry_type' => '']);
    }

    public function switchCountry($country)
    {
        if ($country === 'ng') {
            $this->country = 'gh';
        } else {
            $this->country = 'ng';
        }
    }

    public function submitEntry()
    {
        $data = array_merge(
            $this->validate()['editing'],
            ['country' => $this->country]
        );

        Entry::create($data);

        $this->emitSelf('saved');
        $this->dispatchBrowserEvent('flashalert');
    }

    public function render()
    {
        return view('livewire.entry-form');
    }
}
