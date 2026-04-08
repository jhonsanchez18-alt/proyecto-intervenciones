<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Responsable;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.responsables.index',[
            'responsables' => Responsable::all()
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
            'name' => 'unique:responsables|required|string|max:255',
            //'descripcion' => 'unique:responsables|required|string',
        ]);
        Responsable::create($request->all());
        return redirect()->route('admin.responsables.index')->with('success', "Responsable {$request->name} creado exitosamente.");
    
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
    public function edit(Responsable $responsable)
    {
        return view('admin.responsables.edit', compact('responsable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responsable $responsable)
    {
        {
         $request->validate([
            'name' => "required|string|max:255|unique:responsables,name," . $responsable->id,
           // 'descripcion' => "required|unique:responsables,descripcion," . $responsable->id,
        ]);
        $responsable->update($request->all());
        return redirect()->route('admin.responsables.index')->with('success', "Responsable {$responsable->name} actualizado exitosamente.");
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsable $responsable)
    {
        {
        $responsable->delete();
        return redirect()->route('admin.responsables.index')->with('success', "Responsable {$responsable->name} eliminado exitosamente.");   
    }
    }
}
