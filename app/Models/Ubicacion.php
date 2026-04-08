<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
     protected $fillable = ['nombre', 'descripcion'];
    
    public function getRouteKeyName()
    {
        return 'nombre';
    }
   //relacion inversa de muchos a uno con seccion
public function seccion()
{
    return $this->belongsTo(Seccion::class);            
}
//relacion inversa de muchos a uno con activo
public function activo()
{
    return $this->belongsTo(Activo::class);            
}
}


