<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table = 'personas';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'email',
        'fecha_de_nacimiento',
    ];
}
