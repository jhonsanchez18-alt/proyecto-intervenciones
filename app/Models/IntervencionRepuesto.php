<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IntervencionRepuesto extends Pivot
{
    protected $table = 'intervencion_repuesto';

    protected $fillable = [
        'intervencion_id',
        'repuesto_id',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public $timestamps = false;
}
           
