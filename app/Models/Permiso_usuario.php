<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso_usuario extends Model
{

    
    protected $table = 'permisos_usuarios';

    //
    protected $fillable = [
        'user_id',
        'admin',
        'editar',
        'borrar',
        'crear'
    ];

    protected $casts = [
        'admin' => 'boolean',
        'editar' => 'boolean',
        'borrar' => 'boolean',
        'crear' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
