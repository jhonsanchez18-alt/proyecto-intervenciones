<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tipos.index',[
            'tipos' => Tipo::all()
        ]);
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
        {
        
        $request->validate([
            'nombre' => 'unique:tipos|required|string|max:255',
            'descripcion' => 'unique:tipos|required|string',
        ]);
        Tipo::create($request->all());
        return redirect()->route('admin.tipos.index')->with('success', "Tipo {$request->nombre} creado exitosamente.");
    
    }
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
    public function edit(Tipo $tipo)
    {
       return view('admin.tipos.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
         $request->validate([
            'nombre' => "required|string|max:255|unique:tipos,nombre," . $tipo->id,
            'descripcion' => "required|unique:tipos,descripcion," . $tipo->id,
        ]);
        $tipo->update($request->all());
        return redirect()->route('admin.tipos.index')->with('success', "Tipo {$tipo->nombre} actualizado exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
     {
        $tipo->delete();
        return redirect()->route('admin.tipos.index')->with('success', "Tipo {$tipo->nombre} eliminado exitosamente.");   
    }
}
