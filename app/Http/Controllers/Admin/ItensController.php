<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ItenIntervencionAires;
use App\Models\Tipo;
use Illuminate\Http\Request;

class ItensController extends Controller
{
    // Constructor para aplicar el middleware de permisos
    public function __construct()
    {
        $this->middleware('can:admin.itens.index')->only('index');
        $this->middleware('can:admin.itens.create')->only('create', 'store');
        $this->middleware('can:admin.itens.edit')->only('edit', 'update');
        $this->middleware('can:admin.itens.destroy')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itens = ItenIntervencionAires::all();
        $tipos = Tipo::orderBy('nombre')->get();
        return view('admin.itens.index', compact('itens', 'tipos'));
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
            'nombre' => 'unique:iten_intervencion_aires|required|string|max:255',
            'categoria' => 'required|string',
        ]);
        ItenIntervencionAires::create($request->all());
        return redirect()->route('admin.itens.index')->with('success', "Iten {$request->nombre} creado exitosamente.");
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
    public function edit(ItenIntervencionAires $iten)
    {

        return view('admin.itens.edit', compact('iten'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItenIntervencionAires $iten)
    {
        $request->validate([
            'nombre' => "required|string|max:255|unique:iten_intervencion_aires,nombre," . $iten->id,
            'categoria' => 'required|string',
            
        ]);
        $iten->update($request->all());
        return redirect()->route('admin.itens.index')->with('success', "Iten {$iten->nombre} actualizado exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItenIntervencionAires $iten)
    {
        $iten->delete();
        return redirect()->route('admin.itens.index')->with('success', "Iten {$iten->nombre} eliminado exitosamente.");   
    }
}
