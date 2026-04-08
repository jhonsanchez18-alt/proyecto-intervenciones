<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Repuesto;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tecnicos.index',[
            'tecnicos' => Tecnico::all()
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
        
        $request->validate([
            'nombre' => 'unique:tecnicos|required|string|max:255',
            'especialidad' => 'unique:tecnicos|required|string',
        ]);
        Tecnico::create($request->all());
        return redirect()->route('admin.tecnicos.index')->with('success', "Técnico {$request->nombre} creado exitosamente.");
    
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
    public function edit(Tecnico $tecnico)
    {
        return view('admin.tecnicos.edit', compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tecnico $tecnico)
   {
         $request->validate([
            'nombre' => "required|string|max:255|unique:tecnicos,nombre," . $tecnico->id,
            'especialidad' => "required|unique:tecnicos,especialidad," . $tecnico->id,
        ]);
        $tecnico->update($request->all());
        return redirect()->route('admin.tecnicos.index')->with('success', "Técnico {$tecnico->nombre} actualizado exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnico $tecnico)
    {
        $tecnico->delete();
        return redirect()->route('admin.tecnicos.index')->with('success', "Técnico {$tecnico->nombre} eliminado exitosamente.");   
    }
}
