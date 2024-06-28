@extends('layouts.master')

@section('contenido-principal')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Listado de Equipos</h4>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Entrenador</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                            <tr>
                                <td>{{ $equipo->nombre }}</td>
                                <td>{{ $equipo->entrenador }}</td>
                                <td>
                                    <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este equipo?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h4>Agregar Nuevo Equipo</h4>
                <form action="{{ route('equipos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="entrenador">Entrenador:</label>
                        <input type="text" class="form-control" id="entrenador" name="entrenador" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Equipo</button>
                </form>
            </div>
        </div>
    </div>
@endsection
