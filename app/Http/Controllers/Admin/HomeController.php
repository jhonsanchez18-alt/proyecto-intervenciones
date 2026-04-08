<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activo;
use App\Models\Intervencion;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('/admin/index', [
            'activos'        => Activo::count(),
            'intervenciones' => Intervencion::count(),
            'usuarios'       => User::count(),
            'activosHoy'     => Activo::whereDate('created_at', today())->count(),
        ]);
    }
}

