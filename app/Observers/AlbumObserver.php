<?php

namespace App\Observers;

use App\Models\Album;
use Illuminate\Support\Facades\Cache;

class AlbumObserver
{
    /**
     * Handle the Album "created" event.
     *
     * @param  \App\Models\Album  $album
     * @return void
     */
    public function created(Album $album)
    {
        $this->clearAlbumCache();
    }

    /**
     * Handle the Album "updated" event.
     *
     * @param  \App\Models\Album  $album
     * @return void
     */
    public function updated(Album $album)
    {
        $this->clearAlbumCache();
    }

    /**
     * Handle the Album "deleted" event.
     *
     * @param  \App\Models\Album  $album
     * @return void
     */
    public function deleted(Album $album)
    {
        $this->clearAlbumCache();
    }

    /**
     * Handle the Album "restored" event.
     *
     * @param  \App\Models\Album  $album
     * @return void
     */
    public function restored(Album $album)
    {
        $this->clearAlbumCache();
    }

    /**
     * Handle the Album "force deleted" event.
     *
     * @param  \App\Models\Album  $album
     * @return void
     */
    public function forceDeleted(Album $album)
    {
        $this->clearAlbumCache();
    }

    protected function clearAlbumCache()
    {
        return Cache::forget('albums');
    }
}
