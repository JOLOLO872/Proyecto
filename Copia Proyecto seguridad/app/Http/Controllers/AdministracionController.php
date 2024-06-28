<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Importar el modelo User para las autorizaciones

class AdministracionController extends Controller
{
    /**
     * Mostrar el panel de administración.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Autorizar al usuario para ver el panel de administración
        $this->authorize('viewAdminPanel', User::class);

        // Retornar la vista del panel de administración
        return view('administracion.index');
    }
}
