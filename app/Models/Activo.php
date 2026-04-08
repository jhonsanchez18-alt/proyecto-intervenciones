<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $fillable = [
        'nombre',
        'categoria_id',
        'tipo_id',
        'descripcion',
        'seccion_id',
        'ubicacion_id',
        'marca_id',
        'modelo',
        'numerodeserie',
        'fechacompra',
        'valorcompra',
        'estado_id',
        'responsable_id',
        'identificadorunico',
        'fecha_registro',
        'observaciones',
    ];
     //public function getRouteKeyName()
   // {
     //   return 'nombre';
   // }
    
    //relacion muchos a uno con categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    //relacion muchos a uno con estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    //relacion muchos a uno con marca
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
    //relacion muchos a uno con responsable
    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }
    //relacion muchos a uno con seccion
    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
    //relacion muchos a uno con tipo
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
    //relacion muchos a uno con ubicacion
    public function ubicacion ()
    {
        return $this->belongsTo(Ubicacion::class);
    }
    
    //relacion polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    //relacion uno a muchos con intervencion
    public function intervenciones()
    {
        return $this->hasMany(Intervencion::class);
    }
}
