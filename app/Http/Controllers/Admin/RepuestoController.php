<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Repuesto;
use App\Models\Tipo;

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.repuestos.index',[
            'repuestos' => Repuesto::all(),
            'tipos' => Tipo::orderBy('nombre')->get()
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
            'nombre' => 'unique:repuestos|required|string|max:255',
            'categoria' => 'required|string',
        ]);
        Repuesto::create($request->all());
        return redirect()->route('admin.repuestos.index')->with('success', "Repuesto {$request->nombre} creada exitosamente.");
    
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
    public function edit(Repuesto $repuesto)
    {
        return view('admin.repuestos.edit', compact('repuesto'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repuesto $repuesto)
    {
         $request->validate([
            'nombre' => "required|string|max:255|unique:repuestos,nombre," . $repuesto->id,
            'categoria' => "required|string",
        ]);
        $repuesto->update($request->all());
        return redirect()->route('admin.repuestos.index')->with('success', "Repuesto {$repuesto->nombre} actualizado exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repuesto $repuesto)
    
        {
        $repuesto->delete();
        return redirect()->route('admin.repuestos.index')->with('success', "Repuesto {$repuesto->nombre} eliminado exitosamente.");   
    }
    
}
