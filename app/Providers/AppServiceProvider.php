<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Models\Intervencion; // Importa el modelo
//use App\Observers\IntervencionObserver; // Importa el observer
//usamos Gate para las políticas
use Illuminate\Support\Facades\Gate;
//usamos la política de intervenciones
use App\Models\Intervencion;
//usamos la política de intervenciones
use App\Policies\IntervencionPolicy;

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
        // Registramos la política para el modelo Intervencion
        Gate::policy(Intervencion::class, IntervencionPolicy::class);
        // Le dice a Laravel que escuche eventos del modelo
   // Intervencion::observe(IntervencionObserver::class);
    }
    
}
