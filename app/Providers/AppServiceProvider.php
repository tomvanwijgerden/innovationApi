<?php

namespace App\Providers;

use App\Models\Dossier;
use App\Observers\DossierObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Dossier::observe(DossierObserver::class);
    }
}
