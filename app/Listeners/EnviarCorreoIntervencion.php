<?php

namespace App\Listeners;

use App\Events\IntervencionCreada;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\IntervencionCreadaMail; // Importa el Mailable
use Illuminate\Support\Facades\Mail; // Facade para enviar correos
use Illuminate\Support\Facades\Log;

class EnviarCorreoIntervencion
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(IntervencionCreada $event)
{
    Mail::to('jhonsanchez18@colsafe.edu.co')
        ->queue(new IntervencionCreadaMail($event->intervencion));
}
}
