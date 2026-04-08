<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
       protected $fillable = ['nombre', 'especialidad'];
    
    public function getRouteKeyName()
    {
        return 'nombre';
    }
    //Relacion de uno a muchos con intervenciones
    public function intervenciones()
    {
        return $this->hasMany(Intervencion::class);
    }
}
