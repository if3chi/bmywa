<?php

namespace App\Http\Livewire\Front;

use App\Models\Entry;
use Livewire\Component;
use App\Http\Livewire\Traits\EntryHelper;

class EntryForm extends Component
{
    use EntryHelper;

    public $country;
    public Entry $editing;

    protected $listeners  = ['resetForm'];

    public function mount()
    {
        $this->country = 'gh';
        $this->editing = $this->makeBlank();
    }

    public function resetForm()
    {
        $this->editing = $this->makeBlank();
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

        $this->emitSelf('resetForm');
        $this->flashalert([
            'title' => 'Entry Submitted',
            'body' => 'Kindly Check your email for more details.'
        ]);
    }

    public function render()
    {
        return view('livewire.front.entry-form');
    }

    public function makeBlank()
    {
        return Entry::make(['entry_type' => '']);
    }
}
