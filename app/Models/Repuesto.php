<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $fillable = ['nombre', 'categoria'];
    
    public function getRouteKeyName()
    {
        return 'nombre';
    }
    //relacion de muchos a muchos con intervencion
    public function intervencions()
    {
        return $this->belongsToMany(Intervencion::class);
    }
}
