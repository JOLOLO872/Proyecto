<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\PartidosController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\EstadiosController;

// Rutas de inicio y cierre de sesión
Route::get('/login', [UsuariosController::class, 'showLoginForm'])->name('usuarios.login'); // Mostrar formulario de inicio de sesión
Route::post('/login', [UsuariosController::class, 'login'])->name('usuarios.login.submit'); // Procesar inicio de sesión
Route::post('/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout'); // Procesar cierre de sesión

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index'); // Página de inicio del usuario autenticado

    // Rutas de perfil de usuario
    Route::get('/perfil/editar', [ProfileController::class, 'edit'])->name('profile.edit'); // Mostrar formulario de edición de perfil
    Route::put('/perfil', [ProfileController::class, 'update'])->name('profile.update'); // Actualizar perfil de usuario
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Eliminar perfil de usuario
    Route::get('/perfil/{user}', [ProfileController::class, 'show'])->name('profile.show'); // Mostrar perfil de usuario

    // Rutas de equipos
    Route::resource('equipos', EquiposController::class)->except(['show']); // Recurso para gestionar equipos

    // Rutas de jugadores
    Route::resource('jugadores', JugadoresController::class)->only(['index', 'store']); // Recurso para gestionar jugadores

    // Rutas de partidos
    Route::post('/partidos', [PartidosController::class, 'store'])->name('partidos.store'); // Almacenar nuevo partido
});

// Rutas protegidas por autenticación y autorización de administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdministracionController::class, 'index'])->name('admin.index'); // Panel de administración

    // Ruta para mostrar el formulario de crear usuario administrador
    Route::get('/usuarios/crear-admin', [UsuariosController::class, 'showCrearAdminForm'])->name('usuarios.showCrearAdminForm'); // Mostrar formulario para crear usuario administrador
    Route::post('/usuarios/crear-admin', [UsuariosController::class, 'storeAdmin'])->name('usuarios.storeAdmin'); // Almacenar nuevo usuario administrador

    // Rutas de estadios
    Route::resource('estadios', EstadiosController::class)->except(['show']); // Recurso para gestionar estadios

    // Rutas de usuarios solo para administradores
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index'); // Listado de Usuarios
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create'); // Mostrar formulario para crear usuario
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store'); // Almacenar nuevo usuario
});

// Ruta para la vista de inicio de sesión
Route::view('/auth/login', 'auth.login')->name('auth.login'); // Vista de inicio de sesión
