<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Intervencion;
use App\Events\IntervencionCreada; // Importa el evento

class IntervencionObserver
{
    public function created(Intervencion $intervencion)
{
    event(new IntervencionCreada($intervencion));
}
}
