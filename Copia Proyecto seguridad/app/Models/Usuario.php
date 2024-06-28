<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre', 'email', 'password', 'rol_id'
    ];

    // Campos ocultos que no se deben mostrar
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relación con el rol del usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
