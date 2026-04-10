<?php

namespace App\Models;

use App\Observers\IntervencionObserver;

use Illuminate\Database\Eloquent\Model;
use App\Models\IntervencionRepuesto;



class Intervencion extends Model


{
protected static function booted()
{
    static::observe(IntervencionObserver::class);
}


    protected $fillable = [
        'fecha_intervencion',
        'tipo_intervencion',
        'observaciones',
        'tecnico_id',
        'quien_recibe',
        'user_id',
        'updated_by',
    ];
    //relacion de muchos a uno con activo
    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }
    //Relacion de muchos a muchos con repuesto
    //public function repuestos()
    //{
      // return $this->belongsToMany(Repuesto::class);
   // }
    //Relacion de muchos a uno con tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }
    //relacion de muchos a muchos con ItenIntervencionAires
    public function itenIntervencionAires()
    {
        return $this->belongsToMany(ItenIntervencionAires::class);
    }
    public function repuestos()
    {
        //Relacion de muchos a muchos con repuesto con tabla pivote intervencion_repuesto
        return $this->belongsToMany(Repuesto::class,'intervencion_repuesto')->using(IntervencionRepuesto::class)->withPivot('estado')->withTimestamps();
    }
    //relacion de muchos a muchos con ItenIntervencionAires con tabla pivote intervencion_itenaires
    public function itenaires()
    {
        return $this->belongsToMany(ItenIntervencionAires::class,'intervencion_itenaires')->using(IntervencionItenaires::class)->withPivot('estado')->withTimestamps();
    }
}