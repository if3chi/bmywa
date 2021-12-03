<?php

namespace App\Observers;

use App\Models\Sponsor;
use Illuminate\Support\Facades\Cache;

class SponsorObserver
{
    /**
     * Handle the Sponsor "created" event.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return void
     */
    public function created(Sponsor $sponsor)
    {
        $this->clearSponsorCache();
    }

    /**
     * Handle the Sponsor "updated" event.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return void
     */
    public function updated(Sponsor $sponsor)
    {
        $this->clearSponsorCache();
    }

    /**
     * Handle the Sponsor "deleted" event.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return void
     */
    public function deleted(Sponsor $sponsor)
    {
        $this->clearSponsorCache();
    }

    /**
     * Handle the Sponsor "restored" event.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return void
     */
    public function restored(Sponsor $sponsor)
    {
        $this->clearSponsorCache();
    }

    /**
     * Handle the Sponsor "force deleted" event.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return void
     */
    public function forceDeleted(Sponsor $sponsor)
    {
        $this->clearSponsorCache();
    }

    public function clearSponsorCache()
    {
        Cache::forget('sponsors');
    }
}
