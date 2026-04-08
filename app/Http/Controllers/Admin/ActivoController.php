<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activo;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\User;
use App\Models\Tipo;
use App\Models\Seccion;
use App\Models\Ubicacion;
use App\Http\Requests\StoreActivoRequest;
use App\Models\Repuesto;
use App\Models\Responsable;

class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activos = Activo::orderBy('created_at', 'desc')->get();
        return view('admin.activos.index', compact('activos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.activos.create', [
        'categorias' => Categoria::all(),
        'tipos'      => Tipo::all(),
        'secciones'  => Seccion::all(),
        'ubicaciones'=> Ubicacion::all(),
        'marcas'     => Marca::all(),
        'estados'    => Estado::all(),
        'responsable'   => Responsable::all(),
        
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivoRequest $request)
    {
    Activo::create($request->validated());

    return redirect()
        ->route('admin.activos.index')
        ->with('success', 'Activo creado exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Activo $activo)
    {
        return view('admin.activos.show', compact('activo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activo $activo)
    {
        return view('admin.activos.edit', [
            'activo'      => $activo,
            'categorias'  => Categoria::all(),
            'tipos'       => Tipo::all(),
            'secciones'   => Seccion::all(),
            'ubicaciones' => Ubicacion::all(),
            'marcas'      => Marca::all(),
            'estados'     => Estado::all(),
            'responsable'   => Responsable::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activo $activo)
{
    // Validar los datos
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'categoria_id' => 'nullable|exists:categorias,id',
        'tipo_id' => 'nullable|exists:tipos,id',
        'descripcion' => 'nullable|string|max:255',
        'seccion_id' => 'nullable|exists:seccions,id',
        'ubicacion_id' => 'nullable|exists:ubicacions,id',
        'marca_id' => 'nullable|exists:marcas,id',
        'modelo' => 'nullable|string|max:255',
        'numerodeserie' => 'nullable|string|max:255',
        'fechacompra' => 'nullable|date',
        'valorcompra' => 'nullable|numeric',
        'estado_id' => 'nullable|exists:estados,id',
        'responsable_id' => 'nullable|exists:users,id',
        'identificadorunico' => 'nullable|string|max:255',
        'observaciones' => 'nullable|string',
    ]);

    // Actualizar el activo
    $activo->update($validated);

    // Redirigir con mensaje
    return redirect()
        ->route('admin.activos.index')
        ->with('success', "Activo {$activo->nombre} actualizado exitosamente.");
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activo $activo)
    {
        $activo->delete();

        return redirect()
            ->route('admin.activos.index')
            ->with('success', "Activo {$activo->nombre} eliminado exitosamente.");
    }
}
