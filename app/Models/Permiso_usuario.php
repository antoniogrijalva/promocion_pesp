<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso_usuario extends Model
{
    //
    protected $fillable = [
        'user_id',
        'admin',
        'editar',
        'borrar',
        'crear'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
