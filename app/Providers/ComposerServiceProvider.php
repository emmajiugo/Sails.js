<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['index', 'contact', 'pricing', 'auth.parents-auth', 'auth.schools-auth', 'auth.passwords.email', 'auth.passwords.reset'],
            'App\Http\ViewComposers\FrontendComposer'
        );

        view()->composer(
            ['school.*'],
            'App\Http\ViewComposers\DashboardComposer'
        );
    }
}
