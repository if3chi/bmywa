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
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        $this->createPermission(Constant::JUDGE_ENTRY, [Role::ADMIN, Role::JUDGE]);
        $this->createPermission(Constant::SCORE_ENTRY, [Role::ADMIN, Role::CURATOR]);
        $this->createPermission(Constant::CURATE_ENTRY, [Role::ADMIN, Role::CURATOR]);

        Gate::define(Constant::MANAGE_SITE, fn (User $user) => in_array(Role::ADMIN, $user->abilities));
    }

    private function createPermission(String $ability, array $roles)
    {
        Gate::define($ability, fn (User $user) => 0 < count(array_intersect($user->abilities, $roles)));
    }
}
