@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <h1>Lista de Estadios</h1>
    <div class="mb-3">
        <a href="{{ route('estadios.create') }}" class="btn btn-primary">Agregar Estadio</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estadios as $estadio)
            <tr>
                <td>{{ $estadio->nombre }}</td>
                <td>{{ $estadio->ciudad }}</td>
                <td>
                    <form action="{{ route('estadios.destroy', $estadio->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
