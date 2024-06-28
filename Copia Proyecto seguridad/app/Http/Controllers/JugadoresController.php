<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Equipo;

class JugadoresController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::all();
        $equipos = Equipo::all();
        return view('jugadores.index', compact('jugadores', 'equipos'));
    }

    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'apellido' => 'required|string|max:20',
            'nombre' => 'required|string|max:20',
            'posicion' => 'required|string|max:20',
            'numero' => 'required|integer',
            'equipo' => 'required|exists:equipos,id',
        ]);

        // Crear nuevo jugador
        $jugador = new Jugador();
        $jugador->apellido = $request->apellido;
        $jugador->nombre = $request->nombre;
        $jugador->posicion = $request->posicion;
        $jugador->numero = $request->numero;
        $jugador->equipo_id = $request->equipo;
        $jugador->save();

        return redirect()->route('jugadores.index')->with('success', 'Jugador creado correctamente.');
    }
}
