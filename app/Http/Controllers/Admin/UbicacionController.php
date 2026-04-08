<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ubicacion;
class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         {
        return view('admin.ubicaciones.index',[
            'ubicaciones' => Ubicacion::all()
        ]);
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     {
        
        $request->validate([
            'nombre' => 'unique:ubicacions|required|string|max:255',
            'descripcion' => 'unique:ubicacions|required|string',
        ]);
        Ubicacion::create($request->all());
        return redirect()->route('admin.ubicaciones.index')->with('success', "Ubicación {$request->nombre} creada exitosamente.");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ubicacion $ubicacione)
    {
        return view('admin.ubicaciones.edit', compact('ubicacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ubicacion $ubicacione)
    {
         $request->validate([
            'nombre' => "required|string|max:255|unique:ubicacions,nombre," . $ubicacione->id,
            'descripcion' => "required|unique:ubicacions,descripcion," . $ubicacione->id,
        ]);
        $ubicacione->update($request->all());
        return redirect()->route('admin.ubicaciones.index')->with('success', "Ubicación {$ubicacione->nombre} actualizada exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ubicacion $ubicacione)
    {
        $ubicacione->delete();
        return redirect()->route('admin.ubicaciones.index')->with('success', "Ubicación {$ubicacione->nombre} eliminada exitosamente.");   
    }
}
