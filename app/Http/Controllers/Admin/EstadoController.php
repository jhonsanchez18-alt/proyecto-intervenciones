<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    //Constructor para aplicar el middleware de permisos
    public function __construct()
    {
        $this->middleware('can:admin.estados.index')->only('index');
        $this->middleware('can:admin.estados.create')->only('create', 'store');
        $this->middleware('can:admin.estados.edit')->only('edit', 'update');
        $this->middleware('can:admin.estados.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.estados.index',[
            'estados' => Estado::all()
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
            'nombre' => 'unique:estados|required|string|max:255',
            'descripcion' => 'unique:estados|required|string',
        ]);
        Estado::create($request->all());
        return redirect()->route('admin.estados.index')->with('success', "Estado {$request->nombre} creado exitosamente.");
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
    public function edit(Estado $estado)
    {
        return view('admin.estados.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'nombre' => "required|string|max:255|unique:estados,nombre," . $estado->id,
            'descripcion' => "required|unique:estados,descripcion," . $estado->id,
        ]);
        $estado->update($request->all());
        return redirect()->route('admin.estados.index')->with('success', "Estado {$estado->nombre} actualizado exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estado $estado)
    {
        $estado->delete();
        return redirect()->route('admin.estados.index')->with('success', "Estado {$estado->nombre} eliminado exitosamente.");   
    }
}
