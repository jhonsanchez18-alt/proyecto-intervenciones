<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activo;
use App\Models\Categoria;

class ActivoController extends Controller
{
    public function index()
    {
        $activos = Activo::paginate(10); // Paginación de 10 por página
        return view('activos.index', compact('activos'));
    }

    public function show(Activo $activo)
    {
        return view('activos.show', compact('activo'));
    }

    public function categoria(Categoria $categoria)
    {
        $activos = Activo::where('categoria_id', $categoria->id)->paginate(10);
        return view('activos.categoria', compact('activos'));
    }   
}
