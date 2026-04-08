<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItenIntervencionAires extends Model
{

    protected $fillable = [
        'nombre',
        'categoria',
    ];
    //Relacmuchos a muchos con intervenciones
    public function intervenciones()

{
    return $this->belongsToMany(Intervencion::class, 'intervencion_itenaires')
                ->withPivot('estado')
                ->withTimestamps();
}
}
