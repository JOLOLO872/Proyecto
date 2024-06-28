<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Mostrar el formulario de edición de perfil.
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Actualizar la información del perfil del usuario.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        // Llenar el modelo de usuario con los datos validados
        $user->fill($request->validated());

        // Reiniciar la verificación de correo electrónico si el correo ha cambiado
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Guardar el usuario actualizado
        $user->save();

        // Redirigir de nuevo a la página de edición de perfil con un mensaje de éxito
        return Redirect::route('profile.edit')->with('status', '¡Perfil actualizado!');
    }

    /**
     * Mostrar el perfil del usuario.
     */
    public function show(User $user): View
    {
        // Asegurar que el usuario autenticado o el administrador puedan ver el perfil
        if (Auth::id() === $user->id || Auth::user()->isAdmin()) {
            return view('profile.show', [
                'user' => $user,
            ]);
        } else {
            abort(403, 'No tienes permiso para acceder a este perfil.');
        }
    }

    /**
     * Eliminar la cuenta del usuario.
     */
    public function destroy(): RedirectResponse
    {
        $user = Auth::user();

        // Eliminar la cuenta del usuario
        $user->delete();

        // Cerrar la sesión del usuario
        Auth::logout();

        // Redirigir a la página de inicio después de eliminar la cuenta
        return Redirect::to('/');
    }
}
