<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function getRouteKeyName()
    {
        return 'nombre';
    }
    //Relacion muchos a uno con activo
    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }
}
