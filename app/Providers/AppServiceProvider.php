<?php

namespace App\Providers;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $urlGenerator)
    {
        if (env('APP_ENV') !== 'local') {
            $urlGenerator->forceScheme('https');
        }

        Carbon::macro('toDisplayFormat', function () {
            return $this->format('D, M d, Y');
        });

        Component::macro('notify', function ($msg) {
            $this->dispatchBrowserEvent('notify', $msg);
        });

        Component::macro('flashalert', function ($msg) {
            $this->emitSelf('flashalert', $msg);
        });
    }
}
