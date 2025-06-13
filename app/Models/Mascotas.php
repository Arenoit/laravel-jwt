<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'edad',
        'persona_id',
    ];

    public function persona()
    {
        return $this->belongsTo(\App\Models\Personas::class, 'persona_id', 'id');
    }
}
