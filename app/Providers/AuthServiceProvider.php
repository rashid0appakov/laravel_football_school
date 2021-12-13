<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $gate->define('PARENT_ACCESS', function ($user) {
            return $user->canDo('PARENT_ACCESS', false);
        });

        $gate->define('ADMIN_ACCESS', function ($user) {
            return $user->canDo('ADMIN_ACCESS', false);
        });

        $gate->define('TRAINER_ACCESS', function ($user) {
            return $user->canDo('TRAINER_ACCESS', false);
        });

        $gate->define('MANAGER_ACCESS', function ($user) {
            return $user->canDo('MANAGER_ACCESS', false);
        });
    }
}
