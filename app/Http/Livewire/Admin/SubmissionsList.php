<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entry;
use Livewire\Component;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubmissionsList extends Component
{
    use AuthorizesRequests;

    public $readingView;
    public $activeEntry;
    public $formTitle;
    public $entryScore;
    public $scoredList;
    public $showScoreModal = false;
    public $showScoredList = false;

    protected $rules = ['entryScore' => 'required|numeric|max:50'];

    public function mount()
    {
        $this->scoredList = collect();
    }

    public function openEntry(Entry $entry)
    {
        $this->activeEntry = $entry->id;
        $this->readingView = $entry;
        $this->showScoredList = false;
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
        Cache::forget('scoredList');

        $this->notify(['title' => 'Success!']);
        $this->reset('readingView', 'activeEntry');
        $this->showScoreModal = false;
    }

    public function getScoredList()
    {
        $this->showScoredList = true;
        $this->scoredList = Cache::remember('scoredList', now()->addDays(2), function () {
            return Entry::where('score', '!=', null)->orderBy('updated_at', 'desc')->get();
        });

        $listCount = count($this->scoredList);

        $this->formTitle = "$listCount Scored Entries";
    }

    public function loadData()
    {
        $data = collect();

        if (Gate::allows(Constant::SCORE_ENTRY)) {
            $data = Entry::orderBy('score', 'asc')->get();
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
