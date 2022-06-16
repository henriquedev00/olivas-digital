<?php

namespace App\Providers;

use App\Models\Cliente;
use App\Observers\ClienteObserver;
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
        Cliente::observe(ClienteObserver::class);
    }
}
