<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intervencion;

class IntervencionController extends Controller
{
    public function show(Intervencion $intervencion)
    {
        return view('intervenciones.show', compact('intervencion'));
    }
}
