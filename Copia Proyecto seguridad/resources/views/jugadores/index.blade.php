@extends('layouts.master')

@section('contenido-principal')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Jugadores</h3>
            </div>
        </div>

        <div class="row">
            <!-- tabla de jugadores -->
            <div class="col-12 col-lg-8 order-last order-lg-first">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Posición</th>
                            <th>Número</th>
                            <th>Equipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jugadores as $num => $jugador)
                            <tr>
                                <td class="align-middle">{{ $num + 1 }}</td>
                                <td class="align-middle">{{ $jugador->apellido }}</td>
                                <td class="align-middle">{{ $jugador->nombre }}</td>
                                <td class="align-middle">{{ $jugador->posicion }}</td>
                                <td class="align-middle">{{ $jugador->numero }}</td>
                                <td class="align-middle">
                                    {{ $jugador->equipo != null ? $jugador->equipo->nombre : 'Sin equipo' }}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger pb-0" data-bs-toggle="tooltip"
                                        data-bs-title="Borrar {{ $jugador->nombre }}">
                                        <span class="material-icons">delete</span>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip"
                                        data-bs-title="Editar {{ $jugador->nombre }}">
                                        <span class="material-icons">edit</span>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-info pb-0 text-white" data-bs-toggle="tooltip"
                                        data-bs-title="Ver {{ $jugador->nombre }}">
                                        <span class="material-icons">group</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- form agregar jugador -->
            <div class="col-12 col-lg-4 order-first order-lg-last">
                <div class="card">
                    <div class="card-header bg-dark text-white">Agregar Jugadores</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('jugadores.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" id="apellido" name="apellido" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="posicion">Posición:</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-arquero" name="posicion"
                                            value="Arquero">
                                        <label for="pos-arquero" class="form-check-lable">Arquero</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-defensa" name="posicion"
                                            value="Defensa">
                                        <label for="pos-defensa" class="form-check-lable">Defensa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-volante" name="posicion"
                                            value="Volante">
                                        <label for="pos-volante" class="form-check-lable">Volante</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-delantero" name="posicion"
                                            value="Delantero">
                                        <label for="pos-delantero" class="form-check-lable">Delantero</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numero">Número Camiseta:</label>
                                <input class="form-control" type="number" name="numero" id="numero" min="1" max="99">
                            </div>
                            <div class="form-group">
                                <label for="equipo">Equipo</label>
                                <select class="form-control" name="equipo" id="equipo">
                                    @foreach ($equipos as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 d-grid gap-2 d-lg-block">
                                <button type="reset" class="btn btn-warning">Cancelar</button>
                                <button type="submit" class="btn btn-success">Agregar Jugador</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
