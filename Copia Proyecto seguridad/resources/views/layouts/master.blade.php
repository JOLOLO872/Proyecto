<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <!-- Usuario -->
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="container">
                <div class="row py-2">
                    <div class="col-8">
                        Bienvenido <span class="fw-bold">{{ Auth::user()->nombre }}</span>
                    </div>
                    <div class="col-4 text-end">
                        Último inicio de sesión: {{ date('d-m-Y', strtotime(Auth::user()->ultimo_login)) }} a las
                        {{ date('H:i:s', strtotime(Auth::user()->ultimo_login)) }}
                        <form action="{{ route('usuarios.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link text-white">Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">DOW302</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == 'home.index') active @endif"
                                href="{{ route('home.index') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == 'equipos.index') active @endif"
                                href="{{ route('equipos.index') }}">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == 'jugadores.index') active @endif"
                                href="{{ route('jugadores.index') }}">Jugadores</a>
                        </li>

                        <!-- Mostrar opciones de administración solo para administradores -->
                        @if(Auth::check() && Auth::user()->rol_id == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(in_array(Route::currentRouteName(), ['admin.index', 'usuarios.index', 'usuarios.create'])) active @endif"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administración
                            </a>
                            <ul class="dropdown-menu bg-primary dropdown-menu-dark">
                                <li><a class="dropdown-item @if(Route::currentRouteName() == 'admin.index') active @endif"
                                        href="{{ route('admin.index') }}">Panel de Administración</a></li>
                                <li><a class="dropdown-item @if(Route::currentRouteName() == 'usuarios.index') active @endif"
                                        href="{{ route('usuarios.index') }}">Listado de Usuarios</a></li>
                                <li><a class="dropdown-item @if(Route::currentRouteName() == 'usuarios.create') active @endif"
                                        href="{{ route('usuarios.create') }}">Crear Usuario</a></li>
                            </ul>
                        </li>
                        @endif

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <!-- Contenido principal -->
    <div class="container-fluid">
        @yield('contenido-principal')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
