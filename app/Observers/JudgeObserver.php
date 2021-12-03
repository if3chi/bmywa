<?php

namespace App\Observers;

use App\Models\Judge;
use Illuminate\Support\Facades\Cache;

class JudgeObserver
{
    /**
     * Handle the Judge "created" event.
     *
     * @param  \App\Models\Judge  $judge
     * @return void
     */
    public function created(Judge $judge)
    {
        $this->clearJudgeCache();
    }

    /**
     * Handle the Judge "updated" event.
     *
     * @param  \App\Models\Judge  $judge
     * @return void
     */
    public function updated(Judge $judge)
    {
        $this->clearJudgeCache();
    }

    /**
     * Handle the Judge "deleted" event.
     *
     * @param  \App\Models\Judge  $judge
     * @return void
     */
    public function deleted(Judge $judge)
    {
        $this->clearJudgeCache();
    }

    /**
     * Handle the Judge "restored" event.
     *
     * @param  \App\Models\Judge  $judge
     * @return void
     */
    public function restored(Judge $judge)
    {
        $this->clearJudgeCache();
    }

    /**
     * Handle the Judge "force deleted" event.
     *
     * @param  \App\Models\Judge  $judge
     * @return void
     */
    public function forceDeleted(Judge $judge)
    {
        $this->clearJudgeCache();
    }

    public function clearJudgeCache()
    {
        Cache::forget('judges');
    }
}
