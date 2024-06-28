<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadio;

class EstadiosController extends Controller
{
    public function index()
    {
        $estadios = Estadio::all();
        return view('estadios.index', compact('estadios'));
    }

    public function create()
    {
        return view('estadios.create');
    }

    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:50',
            'ciudad' => 'required|string|max:50',
        ]);

        // Crear nuevo estadio
        $estadio = new Estadio();
        $estadio->nombre = $request->nombre;
        $estadio->ciudad = $request->ciudad;
        $estadio->save();

        return redirect()->route('estadios.index')->with('success', 'Estadio creado correctamente.');
    }

    public function destroy(Estadio $estadio)
    {
        $estadio->delete();
        return redirect()->route('estadios.index')->with('success', 'Estadio eliminado correctamente.');
    }
}
