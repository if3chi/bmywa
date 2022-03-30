<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define(Constant::CURATE_ENTRY, function (User $user) {
            return 0 < count(array_intersect($user->abilities, [Role::ADMIN, Role::CURATOR]));
        });
        Gate::define(Constant::SCORE_ENTRY, function (User $user) {
            return 0 < count(array_intersect($user->abilities, [Role::ADMIN, Role::CURATOR]));
        });
        Gate::define(Constant::JUDGE_ENTRY, function (User $user) {
            return 0 < count(array_intersect($user->abilities, [Role::ADMIN, Role::JUDGE]));
        });
        Gate::define(Constant::MANAGE_SITE, fn (User $user) => in_array(Role::ADMIN, $user->abilities));
    }
}
