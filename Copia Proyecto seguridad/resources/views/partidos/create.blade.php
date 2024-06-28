{{-- @extends('layouts.master')

@section('contenido-principal')
    <div class="container">
        <h2>Registrar Partido</h2>
        <form action="{{ route('partidos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="fecha">Fecha del Partido</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="jugador_id">Jugador</label>
                <select class="form-control" id="jugador_id" name="jugador_id" required>
                    @foreach($jugadores as $jugador)
                        <option value="{{ $jugador->id }}">{{ $jugador->nombre }} {{ $jugador->apellido }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Partido</button>
        </form>
    </div>
@endsection --}}
