<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sede;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function index(): View{
        $users = User::all();
        return view('configsystem\users',['users' => $users]);
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $sedes = Sede::all();
        return view('auth.register', ['sedes'=>$sedes]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'tipo_documento' => ['required', 'string', 'max:255'],
            'numero_documento' => ['required', 'string', 'max:255'],
            'sede_id' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'celular' => $request->celular,
            'email' => $request->email,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'sede_id' => $request->sede_id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        return redirect(RouteServiceProvider::HOME);
    }

}
