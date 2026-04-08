<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activo;
use App\Models\Intervencion;
use App\Models\Tecnico;
use Illuminate\Http\Request;
Use App\Http\Requests\StoreIntervencionRequest;
use App\Models\ItenIntervencionAires;
use App\Models\Repuesto;

class IntervencionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Activo $activo)
    {
        $iten_intervenciones = ItenIntervencionAires::all();
       $tecnicos = Tecnico::all();
       $repuestos = Repuesto::where('categoria', $activo->tipo->nombre)->orderBy('nombre')->get();
       //Mandamos los ítems filtrados por el tipo de activo, al crear un iten de intervencion le asignamos la categoria a este 
       //desde una lista desplegable que depende del tipo de activo.
        $iten_intervenciones = ItenIntervencionAires::where('categoria', $activo->tipo->nombre)->orderBy('nombre')->get();
        return view('admin.intervenciones.create', [
            'activo' => $activo,
            'tipos'    => ['Preventiva', 'Correctiva', 'Revisión','Instalación','Baja', 'Traslado'],
            'tecnicos' => $tecnicos,
            'repuestos' => $repuestos,
            'iten_intervenciones' => $iten_intervenciones
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIntervencionRequest $request, Activo $activo)
{
    // 1️⃣ Crear intervención
    $intervencion = $activo->intervenciones()->create(
        $request->validated()
    );
    

    // 2️⃣ Guardar REPUESTOS (true y false)
    $repuestos = [];

    foreach ($request->repuestos ?? [] as $repuestoId => $estado) {
        $repuestos[$repuestoId] = [
            'estado' => (bool) $estado
        ];
    }

    $intervencion->repuestos()->sync($repuestos);

    // 3️⃣ Guardar ÍTEMS (true y false)
    $itenes = [];

    foreach ($request->iten_intervenciones ?? [] as $itenId => $estado) {
        $itenes[$itenId] = [
            'estado' => (bool) $estado
        ];
    }

    $intervencion->itenaires()->sync($itenes);

    // 4️⃣ Redirección
    return redirect()
        ->route('admin.activos.show', $activo)
        ->with('success', 'Intervención registrada correctamente.');
}


    

    /**
     * Display the specified resource.
     */
    public function show(Intervencion $intervencione)
    {

        return view('admin.intervenciones.show', compact('intervencione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Activo $activo, Intervencion $intervencione)
{
    $tipos = ['Preventiva', 'Correctiva', 'Revisión','Instalación','Baja', 'Traslado'];

    $tecnicos = Tecnico::all();
   $repuestos = Repuesto::where('categoria', $activo->tipo->nombre)->orderBy('nombre')->get();
    $iten_intervenciones = ItenIntervencionAires::where('categoria', $activo->tipo->nombre)->orderBy('nombre')->get();

    return view('admin.intervenciones.edit', [
    'activo' => $activo,
    'intervencione' => $intervencione,
    'repuestos' => $repuestos,
    'iten_intervenciones' => $iten_intervenciones,
    'tecnicos' => $tecnicos,
    'tipos' => $tipos,
]);
}


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Intervencion $intervencione)
{
    $activo = $intervencione->activo;
    $intervencione->update([
        'fecha_intervencion' => $request->fecha_intervencion,
        'tipo_intervencion'  => $request->tipo_intervencion,
        'tecnico_id'         => $request->tecnico_id,
        'quien_recibe'       => $request->quien_recibe,
        'observaciones'      => $request->observaciones,
    ]);

    // === REPUESTOS ===
    $repuestos = [];
    foreach($request->repuestos ?? [] as $id => $estado){
        $repuestos[$id] = ['estado' => $estado];
    }
    $intervencione->repuestos()->sync($repuestos);

    // === ITEMS ===
    $items = [];
    foreach($request->iten_intervenciones ?? [] as $id => $estado){
        $items[$id] = ['estado' => $estado];
    }
    $intervencione->itenaires()->sync($items);

   return redirect()
    ->route('admin.activos.show', $activo->id)
    ->with('success', "Intervención con ID {$intervencione->id} actualizada correctamente.");

       //"{{ route('admin.activos.intervenciones.edit', [ $intervencione->activo,$intervencione]) }}"
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activo $activo, Intervencion $intervencione)
{
    $intervencione->delete();

    return redirect()
        ->route('admin.activos.show', $activo)
        ->with('success', 'Intervención con ID ' . $intervencione->id . ' eliminada correctamente.');
}
}
