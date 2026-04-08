<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Usamos spatie para los  roles
use Spatie\Permission\Models\Role;
//usamos spatie para los permisos
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Role1 = Role::create(['name' => 'admin']);
        $Role2 = Role::create(['name' => 'tecnico']);
        $Role3 = Role::create(['name' => 'viewer']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$Role1, $Role2, $Role3]);
        
        Permission::create(['name' => 'admin.users.index']);
        Permission::create(['name' => 'admin.users.create']);
        Permission::create(['name' => 'admin.users.edit']);
        Permission::create(['name' => 'admin.users.destroy']);
        Permission::create(['name' => 'admin.categorias.index']);
        Permission::create(['name' => 'admin.categorias.create']);
        Permission::create(['name' => 'admin.categorias.edit']);
        Permission::create(['name' => 'admin.categorias.destroy']);
        Permission::create(['name' => 'admin.activos.index']);
        Permission::create(['name' => 'admin.activos.create']);
        Permission::create(['name' => 'admin.activos.edit']);
        Permission::create(['name' => 'admin.activos.destroy']);
        Permission::create(['name' => 'admin.intervenciones.index']);
        Permission::create(['name' => 'admin.intervenciones.create']);
        Permission::create(['name' => 'admin.intervenciones.edit']);
        Permission::create(['name' => 'admin.intervenciones.destroy']);
        Permission::create(['name' => 'admin.estados.index']);
        Permission::create(['name' => 'admin.estados.create']);
        Permission::create(['name' => 'admin.estados.edit']);
        Permission::create(['name' => 'admin.estados.destroy']);
        Permission::create(['name' => 'admin.marcas.index']);
        Permission::create(['name' => 'admin.marcas.create']);
        Permission::create(['name' => 'admin.marcas.edit']);
        Permission::create(['name' => 'admin.marcas.destroy']);
        Permission::create(['name' => 'admin.repuestos.index']);
        Permission::create(['name' => 'admin.repuestos.create']);
        Permission::create(['name' => 'admin.repuestos.edit']);
        Permission::create(['name' => 'admin.repuestos.destroy']);
        Permission::create(['name' => 'admin.responsables.index']);
        Permission::create(['name' => 'admin.responsables.create']);
        Permission::create(['name' => 'admin.responsables.edit']);
        Permission::create(['name' => 'admin.responsables.destroy']);
        Permission::create(['name' => 'admin.secciones.index']);
        Permission::create(['name' => 'admin.secciones.create']);
        Permission::create(['name' => 'admin.secciones.edit']);
        Permission::create(['name' => 'admin.secciones.destroy']);
        Permission::create(['name' => 'admin.ubicaciones.index']);
        Permission::create(['name' => 'admin.ubicaciones.create']);
        Permission::create(['name' => 'admin.ubicaciones.edit']);
        Permission::create(['name' => 'admin.ubicaciones.destroy']);
        Permission::create(['name' => 'admin.tecnicos.index']);
        Permission::create(['name' => 'admin.tecnicos.create']);
        Permission::create(['name' => 'admin.tecnicos.edit']);
        Permission::create(['name' => 'admin.tecnicos.destroy']);
        Permission::create(['name' => 'admin.tipos.index']);
        Permission::create(['name' => 'admin.tipos.create']);
        Permission::create(['name' => 'admin.tipos.edit']);
        Permission::create(['name' => 'admin.tipos.destroy']);
        Permission::create(['name' => 'admin.itens.index']);
        Permission::create(['name' => 'admin.itens.create']);
        Permission::create(['name' => 'admin.itens.edit']);
        Permission::create(['name' => 'admin.itens.destroy']);  


    }
}
