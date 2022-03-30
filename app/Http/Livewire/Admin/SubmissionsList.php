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
    public $methodName;
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
        $this->getScoreForm('Score:', 'setEntryScore', $this->readingView->score);
    }

    public function judgeEntry()
    {
        $this->authorize(Constant::JUDGE_ENTRY);
        $this->getScoreForm('Judge:', 'setJusdgeScore', $this->readingView->judge_score);
    }

    private function getScoreForm(string $title, string $method, $score): void
    {
        $this->reset('entryScore', 'methodName');
        $this->entryScore = $score;
        $this->methodName = $method;
        $this->formTitle = "$title {$this->readingView->contestant_name}";

        $this->showScoreModal = true;
    }

    public function setEntryScore(): void
    {
        $this->authorize(Constant::SCORE_ENTRY);
        $this->setScore('scoredList', 'score');
    }

    public function setJusdgeScore(): void
    {
        $this->authorize(Constant::JUDGE_ENTRY);
        $this->setScore('judgedList', 'judge_score');
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

            $creative_ng = Entry::orderBy('score', 'desc')
                ->where('score', '!=', null)
                ->where('country', 'ng')
                ->where('entry_type', $categories[0])
                ->take(3)->get();
            $essay_ng = Entry::orderBy('score', 'desc')
                ->where('score', '!=', null)
                ->where('country', 'ng')
                ->where('entry_type', $categories[1])
                ->take(3)->get();
            $peotry_ng = Entry::orderBy('score', 'desc')
                ->where('score', '!=', null)
                ->where('country', 'ng')
                ->where('entry_type', $categories[2])
                ->take(3)->get();

            $creative_gh = Entry::orderBy('score', 'desc')
                ->where('score', '!=', null)
                ->where('country', 'gh')
                ->where('entry_type', $categories[0])
                ->take(3)->get();
            $essay_gh = Entry::orderBy('score', 'desc')
                ->where('score', '!=', null)
                ->where('country', 'gh')
                ->where('entry_type', $categories[1])
                ->take(3)->get();
            $peotry_gh = Entry::orderBy('score', 'desc')
                ->where('score', '!=', null)
                ->where('country', 'gh')
                ->where('entry_type', $categories[2])
                ->take(3)->get();


            $data = $data->merge($peotry_ng)->merge($creative_ng)->merge($essay_ng);
            $data = $data->merge($peotry_gh)->merge($creative_gh)->merge($essay_gh)->sortByDesc('score');
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
