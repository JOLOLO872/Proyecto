<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;

class PartidosController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'jugador' => 'required|exists:jugadores,id',
            'fecha' => 'required|date',
        ]);

        // Crear nuevo partido
        $partido = new Partido();
        $partido->jugador_id = $request->jugador;
        $partido->fecha = $request->fecha;
        $partido->save();

        return redirect()->back()->with('success', 'Partido registrado exitosamente.');
    }
}
