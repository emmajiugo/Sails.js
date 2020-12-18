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
            ['index', 'contact', 'pricing', 'live-chat', 'auth.*', 'auth.passwords.*'],
            'App\Http\ViewComposers\FrontendComposer'
        );

        view()->composer(
            ['school.*'],
            'App\Http\ViewComposers\DashboardComposer'
        );
    }
}
