<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Models\Intervencion; // Importa el modelo
//use App\Observers\IntervencionObserver; // Importa el observer

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
        // Le dice a Laravel que escuche eventos del modelo
   // Intervencion::observe(IntervencionObserver::class);
    }
}
