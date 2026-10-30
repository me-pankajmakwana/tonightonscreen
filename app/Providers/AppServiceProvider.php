<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \App\Models\Person::observe(\App\Observers\PersonObserver::class);
        \App\Models\Title::observe(\App\Observers\TitleObserver::class);
    }
}
