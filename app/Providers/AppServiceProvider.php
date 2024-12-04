<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\resident_tbl;
use App\Observers\ResidentObserver;

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
        resident_tbl::observe(ResidentObserver::class);
    }
}
