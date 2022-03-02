<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entry;
use Livewire\Component;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubmissionsList extends Component
{
    use AuthorizesRequests;

    public $readingView;
    public $activeEntry;
    public $formTitle;
    public $entryScore;
    public $showScoreModal = false;

    protected $rules = ['entryScore' => 'required|numeric|max:100'];

    public function openEntry(Entry $entry)
    {
        $this->activeEntry = $entry->id;
        $this->readingView = $entry;
    }

    public function scoreEntry()
    {
        $this->authorize(Constant::SCORE_ENTRY);

        $this->reset('entryScore');
        $this->formTitle = "Score: {$this->readingView->contestant_name}";

        $this->showScoreModal = true;
    }

    public function setScore()
    {
        $this->authorize(Constant::SCORE_ENTRY);
        $validScore = $this->validate()['entryScore'];

        $this->readingView->setAttribute('score', $validScore)->save();

        $this->notify(['title' => 'Success!']);
        $this->reset('readingView', 'activeEntry');
        $this->showScoreModal = false;
    }

    public function loadData()
    {
        $data = collect();

        if (Gate::allows(Constant::SCORE_ENTRY)) {
            $data = Entry::where('score', null)->get();
        }

        return $data;
    }

    public function render()
    {
        return view('livewire.admin.submissions-list', [
            'entries' => $this->loadData()
        ])->layout('layouts.admin');
    }
}
