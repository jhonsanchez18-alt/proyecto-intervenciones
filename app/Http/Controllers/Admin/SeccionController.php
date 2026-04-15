<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seccion;

class SeccionController extends Controller
{
    //middleware para proteger las rutas
    public function __construct()
    {
        $this->middleware('can:admin.secciones.index')->only('index');
        $this->middleware('can:admin.secciones.create')->only('create','store');
        $this->middleware('can:admin.secciones.edit')->only('edit','update');
        $this->middleware('can:admin.secciones.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.secciones.index',[
            'secciones' => Seccion::all()
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
            'nombre' => 'unique:seccions|required|string|max:255',
            'descripcion' => 'unique:seccions|required|string',
        ]);
        Seccion::create($request->all());
        return redirect()->route('admin.secciones.index')->with('success', "Sección {$request->nombre} creada exitosamente.");
    
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
    public function edit(Seccion $seccione)
    {
        return view('admin.secciones.edit', compact('seccione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seccion $seccione)
    
        {
         $request->validate([
            'nombre' => "required|string|max:255|unique:seccions,nombre," . $seccione->id,
            'descripcion' => "required|unique:seccions,descripcion," . $seccione->id,
        ]);
        $seccione->update($request->all());
        return redirect()->route('admin.secciones.index')->with('success', "Sección {$seccione->nombre} actualizada exitosamente.");
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seccion $seccione)
    
        {
        $seccione->delete();
        return redirect()->route('admin.secciones.index')->with('success', "Sección {$seccione->nombre} eliminada exitosamente.");   
    }
    
}
