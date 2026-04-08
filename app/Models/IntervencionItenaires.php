<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IntervencionItenaires extends Pivot
{
    protected $table = 'intervencion_itenaires';

    protected $fillable = [
        'intervencion_id',
        'iten_intervencion_aire_id',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public $timestamps = false;
}
