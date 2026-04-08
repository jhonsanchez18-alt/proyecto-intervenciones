<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
     protected $fillable = ['nombre', 'descripcion'];
    
    public function getRouteKeyName()
    {
        return 'nombre';
    }
    //relacion de uno a muchos con ubicacion
public function ubicaciones()
{
    return $this->hasMany(Ubicacion::class);
}
//relacion de uno a many con activo
public function activos()
{
    return $this->hasMany(Activo::class);   
}
}
