<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perido extends Model
{
    
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'activo'
    ];
}
