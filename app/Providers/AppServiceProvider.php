<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;

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
        Carbon::setLocale(config('app.locale'));
        Carbon::setlocale('fr_FR.UTF-8');
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        setlocale(LC_MONETARY, 'fr_FR.UTF-8');
    }
}
