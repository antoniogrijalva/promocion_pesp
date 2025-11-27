<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\Perido;
use App\Models\User;

class Convocatoria extends Model
{
    protected $fillable = [
        'user_id',
        'fecha',
        'empleado_id',
        'puesto_actual',
        'puesto_solicitado',
        'observaciones',
        'periodo_id'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Perido::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
