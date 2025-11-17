<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];


    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return (bool) $user->is_admin;
        });

        Gate::before(function (User $user, string $ability) {
            if ($user->is_admin) {
                return true;
            }
        });
    }
}
