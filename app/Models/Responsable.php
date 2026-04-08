<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
     protected $fillable = ['name'];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
    //Relacion de uno a muchos con activo
    public function activos()
    {
        return $this->hasMany(Activo::class);
    }
}
