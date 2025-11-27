<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    // Opcional: Laravel ya detecta 'empleados' automáticamente
    protected $table = 'empleados';
    

    protected $fillable = [
        'num_empleado',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'baja',
        'baja_fecha',
        'fecha_ingreso',
        'email',
        'curp',
        'telefono',
        'puesto',
        'acreditacion_cuip',
        'acreditacion_cuip_fecha',
        'acreditacion_cuip_vigencia',
        'acreditacion_formacion',
        'acreditacion_formacion_fecha',
        'acreditacion_competencias',
        'acreditacion_competencias_fecha',
        'acreditacion_competencias_vigencia',
        'acreditacion_competencias_calificacion',
        'acreditacion_c3',
        'acreditacion_c3_fecha',
        'acreditacion_c3_vigencia',
        'acreditacion_c3_observaciones',
        'acreditacion_desempeno',
        'acreditacion_desempeno_fecha',
        'acreditacion_desempeno_vigencia',
        'acreditacion_desempeno_calificacion',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'baja' => 'boolean',
        'baja_fecha' => 'date',
        'fecha_ingreso' => 'date',
        'acreditacion_cuip_fecha' => 'date',
        'acreditacion_cuip_vigencia' => 'date',
        'acreditacion_formacion' => 'boolean',
        'acreditacion_formacion_fecha' => 'date',
        
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
}
