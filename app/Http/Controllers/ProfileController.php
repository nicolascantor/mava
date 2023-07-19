<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Sede;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'sedes' => Sede::all(),
        ]);
    }


    public function editar($id): View
    {
        return view('configsystem.edit-user', [
            'user' => User::find($id),
            'sedes' => Sede::all(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function actualizar(Request $request, $id){

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email,'.$id],
            'tipo_documento' => ['required', 'string', 'max:255'],
            'numero_documento' => ['required', 'string', 'max:255'],
            'sede_id' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find($id);

        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->tipo_documento = $request->tipo_documento;
        $user->numero_documento = $request->numero_documento;
        $user->sede_id = $request->sede_id;

        if($request->password != null){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return Redirect::route('users');

    }
}
