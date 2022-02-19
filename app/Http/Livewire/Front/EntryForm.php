<?php

namespace App\Http\Livewire\Front;

use App\Models\Entry;
use Livewire\Component;
use App\Actions\Entry\ProcessEntry;
use App\Http\Livewire\Traits\EntryHelper;

class EntryForm extends Component
{
    use EntryHelper;

    public $country;
    public Entry $editing;

    protected $listeners  = ['resetForm'];

    public function mount()
    {
        $this->editing = $this->makeBlank();
    }

    public function resetForm()
    {
        $this->editing = $this->makeBlank();
    }

    public function submitEntry(ProcessEntry $processEntry)
    {
        $message = $processEntry($this->validate()['editing']);

        $this->flashalert($message);

        $this->emitSelf('resetForm');
    }

    public function render()
    {
        return view('livewire.front.entry-form');
    }

    public function makeBlank()
    {
        return Entry::make(['age' => '', 'entry_type' => '', 'country' => '']);
    }
}
