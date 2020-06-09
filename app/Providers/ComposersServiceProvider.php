<?php

namespace App\Providers;

use App\ViewComposers\AppSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AppSettings::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AppSettings::class);
    }
}
