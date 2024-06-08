<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Gate::define('manage-users', function ($user) {
            return $user->hasAnyRole(['admin', 'utilisateur']);
        });

        Gate::define('edit-users', function ($user) {
            return $user->hasAnyRole(['admin', 'utilisateur']);
        });

        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });
    }


}
