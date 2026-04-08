<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.marcas.index', [
            'marcas' => Marca::all()
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
            'nombre' => 'unique:marcas|required|string|max:255',
            'descripcion' => 'unique:marcas|required|string',
        ]);
        Marca::create($request->all());
        return redirect()->route('admin.marcas.index')->with('success', "Marca {$request->nombre} creada exitosamente.");
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
    public function edit(Marca $marca)
    {
        return view('admin.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => "required|string|max:255|unique:marcas,nombre," . $marca->id,
            'descripcion' => "required|unique:marcas,descripcion," . $marca->id,
        ]);
        $marca->update($request->all());
        return redirect()->route('admin.marcas.index')->with('success', "Marca {$marca->nombre} actualizada exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('admin.marcas.index')->with('success', "Marca {$marca->nombre} eliminada exitosamente.");   
    }
}
