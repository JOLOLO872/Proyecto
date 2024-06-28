@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <h1>Crear Nuevo Equipo</h1>
    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="entrenador" class="form-label">Entrenador</label>
            <input type="text" class="form-control" id="entrenador" name="entrenador" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Equipo</button>
    </form>
</div>
@endsection
