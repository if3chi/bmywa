<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\Judge;
use App\Models\Sponsor;
use App\Observers\AlbumObserver;
use App\Observers\JudgeObserver;
use App\Observers\SponsorObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Album::observe(AlbumObserver::class);
        Judge::observe(JudgeObserver::class);
        Sponsor::observe(SponsorObserver::class);
    }
}
