<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Jetstream\Role;
//importamos el modelo Role de Spatie para obtener los roles disponibles
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

// Agregamos el constructor para aplicar el middleware de autenticación
public function __construct()
{
    $this->middleware('can:admin.users.index')->only('index');
    $this->middleware('can:admin.users.edit')->only('edit', 'update');
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('admin.users.index');
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
        

    // 1️⃣ Validación
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|exists:roles,name', // 👈 ahora es name
    ]);

    // 2️⃣ Crear usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // 3️⃣ Asignar rol directamente
    $user->assignRole($request->role);

    // 4️⃣ Redirección
    return redirect()
        ->route('admin.users.index')
        ->with('success', "Usuario {$user->name} creado correctamente");

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
    public function edit(User $user)
    {
        $roles = ModelsRole::all();
        return  view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    // Asignar rol correctamente
    $user->syncRoles([$request->role]);

    return redirect()
        ->route('admin.users.index')
        ->with('success', "Usuario {$user->name} actualizado correctamente");
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('admin.users.index')
            ->with('success', "Usuario {$user->name} eliminado correctamente");

    }
}
