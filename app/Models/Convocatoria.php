<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\Periodo;
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
        'periodo_id',

        'acreditacion_cup_fecha',
        'acreditacion_cup_vigencia',
               
        'acreditacion_competencias',
        'acreditacion_competencias_fecha',
        'acreditacion_competencias_vigencia',
        'acreditacion_competencias_calificacion',
           
        'acreditacion_c3',
        'acreditacion_c3_fecha',
        'acreditacion_c3_vigencia',
           
        'acreditacion_desempeno',
        'acreditacion_desempeno_fecha',
        'acreditacion_desempeno_vigencia',
        'acreditacion_desempeno_calificacion',
    ];
    protected $casts = [
        'acreditacion_cup_fecha' => 'date',
        'acreditacion_cup_vigencia' => 'date',

        'puesto_fecha' => 'date',
               
        'acreditacion_competencias' => 'boolean',
        'acreditacion_competencias_fecha' => 'date',
        'acreditacion_competencias_vigencia' => 'date',
        'acreditacion_competencias_calificacion' => 'decimal:2',
       
        'acreditacion_c3' => 'boolean',
        'acreditacion_c3_fecha' => 'date',
        'acreditacion_c3_vigencia' => 'date',
       
        'acreditacion_desempeno' => 'boolean',
        'acreditacion_desempeno_fecha' => 'date',
        'acreditacion_desempeno_vigencia' => 'date',
        'acreditacion_desempeno_calificacion' => 'decimal:2',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
