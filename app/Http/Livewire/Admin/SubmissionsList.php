<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entry;
use Livewire\Component;
use App\Utilities\Constant;
use Illuminate\Support\Facades\{Cache, Gate};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubmissionsList extends Component
{
    use AuthorizesRequests;

    public $readingView, $activeEntry, $formTitle, $entryScore, $scoredList;
    public $methodName, $filterKey, $showScoreModal = false, $showScoredList = false;

    protected $rules = ['entryScore' => 'required|numeric|max:50'];

    public function mount()
    {
        $this->scoredList = collect();
        $this->filterKey = auth()->user()->country;
    }

    public function openEntry($entry)
    {
        $this->readingView = Entry::with('judges')->findOrFail($entry);
        $this->activeEntry = $this->readingView->id;
        $this->showScoredList = false;
    }

    public function filterList($key)
    {
        $this->filterKey = $key;
    }

    public function scoreEntry()
    {
        $this->authorize(Constant::SCORE_ENTRY);
        $this->getScoreForm('Score:', 'setEntryScore', $this->readingView->score);
    }

    public function judgeEntry()
    {
        $this->authorize(Constant::JUDGE_ENTRY);

        $this->getScoreForm('Judge:', 'setJudgeScore', $this->readingView->judge_score);
    }

    private function getScoreForm(string $title, string $method, $score): void
    {
        $this->reset('entryScore', 'methodName');
        $this->entryScore = $score;
        $this->methodName = $method;
        $this->formTitle = "$title {$this->readingView->contestant_name}";

        $this->showScoreModal = true;
    }

    public function setJudgeScore(): void
    {
        $this->authorize(Constant::JUDGE_ENTRY);

        $validScore = $this->validate()['entryScore'];

        if ($this->readingView->judge_score) {
            $this->readingView->judges()->detach(auth()->user()->id);
            $this->readingView->judges()->attach(auth()->user()->id, ['score' => $validScore]);
        } else {
            $this->readingView->judges()->attach(auth()->user()->id, ['score' => $validScore]);
        }

        $this->notify(['title' => 'Success!']);
        $this->reset('readingView', 'activeEntry');
        $this->showScoreModal = false;
    }

    public function setEntryScore(): void
    {
        $this->authorize(Constant::SCORE_ENTRY);
        $this->setScore('scoredList', 'score');
    }


    private function setScore(string $cacheKey, string $field): void
    {
        $validScore = $this->validate()['entryScore'];

        $this->readingView->setAttribute($field, $validScore)->save();
        Cache::forget($cacheKey);

        $this->notify(['title' => 'Success!']);
        $this->reset('readingView', 'activeEntry');
        $this->showScoreModal = false;
    }

    public function getScoredList(): void
    {
        $this->showScoredList = true;

        if (Gate::allows(Constant::SCORE_ENTRY)) {
            $this->scoredList = Cache::remember('scoredList', now()->addDays(2), function () {
                return Entry::where('score', '!=', null)->orderBy('updated_at', 'desc')->get();
            });
        }

        if (Gate::allows(Constant::JUDGE_ENTRY)) {
            $this->scoredList = Cache::remember('judgedList', now()->addDays(2), function () {
                return Entry::where('judge_score', '!=', null)->orderBy('judge_score', 'desc')->get();
            });
        }

        $listCount = count($this->scoredList);

        $this->formTitle = "$listCount Scored Entries";
    }

    public function loadData()
    {
        $data = collect();

        if (Gate::allows(Constant::SCORE_ENTRY)) {
            $data = Entry::orderBy('score', 'asc')->get();
        }

        if (Gate::allows(Constant::JUDGE_ENTRY)) {
            // select 3 entries from each categories in each country
            $data = collect();

            $categories = array_keys(entryCategories());

            // TODO: revisit this time bomb
            foreach ($categories as $category) {
                $data = $data->merge(Entry::with('judges')
                    ->where('score', '!=', null)
                    ->when($this->filterKey, function ($query) {
                        return $query->where('country', $this->filterKey);
                    })
                    ->where('entry_type', $category)
                    ->get()
                    ->sortByDesc('score')
                    ->take(3));
            }
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
