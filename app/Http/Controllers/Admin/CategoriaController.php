<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    ///Protegemos el controlador con el middleware de autenticación
    public function __construct()
    {
        $this->middleware('can:admin.categorias.index')->only('index');
        $this->middleware('can:admin.categorias.create')->only('create', 'store');
        $this->middleware('can:admin.categorias.edit')->only('edit', 'update');
        $this->middleware('can:admin.categorias.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categorias.index', [
            'categorias' => Categoria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'unique:categorias|required|string|max:255',
            'descripcion' => 'unique:categorias|required|string',
        ]);
        Categoria::create($request->all());
        return redirect()->route('admin.categorias.index')->with('success', "Categoría {$request->nombre} creada exitosamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('admin.categorias.show', compact('categoria'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
       $request->validate([
            'nombre' => "required|string|max:255|unique:categorias,nombre," . $categoria->id,
            'descripcion' => "required|unique:categorias,descripcion," . $categoria->id,
        ]);
        $categoria->update($request->all());
        return redirect()->route('admin.categorias.index')->with('success', "Categoría {$categoria->nombre} actualizada exitosamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('success', "Categoría {$categoria->nombre} eliminada exitosamente.");   
    }
}
