@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <h1>Crear Nuevo Estadio</h1>
    <form action="{{ route('estadios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Estadio</button>
    </form>
</div>
@endsection
