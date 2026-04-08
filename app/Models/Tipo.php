<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = ['nombre', 'descripcion'];
    
    public function getRouteKeyName()
    {
        return 'nombre';
    }
    //Relacion uno a muchos con activos
    public function activos()
    {
        return $this->hasMany(Activo::class);
    }
}
