<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores';

    protected $fillable = [
        'apellido', 'nombre', 'posicion', 'numero', 'equipo_id',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
