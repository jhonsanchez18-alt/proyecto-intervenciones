<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];

    public function getRouteKeyName()
    {
        return 'nombre';
    }

    //relacion uno a muchos con activos
    public function activos()
    {
        return $this->hasMany(Activo::class);
    }

}
