<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Sede;
use App\Models\Simplified_regimen;
use Illuminate\Http\RedirectResponse;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): view
    {
        $sedes = Sede::all();
        return view('configsystem.sedes', ['sedes' => $sedes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): view
    {
        $regimenes_simplificados = Simplified_regimen::all();
        return view('configsystem.create-sede', ['regimenes_simplificados'=>$regimenes_simplificados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required','string'],
            'direccion' => ['required','string'],
            'telefono' => ['required','string'],
            'ciudad' => ['required','string'],
            'regimen_simplificado' => ['required']
        ]);

        $new_sede = new Sede;
        $new_sede->nombre = $request->nombre;
        $new_sede->direccion = $request->direccion;
        $new_sede->telefono = $request->telefono;
        $new_sede->ciudad = $request->ciudad;
        $new_sede->regimen_simplificado_id = $request->regimen_simplificado;
        $new_sede->save();

        return redirect('/sedes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sede = Sede::find($id);
        $regimenes_simplificados = Simplified_regimen::all();

        return view('configsystem.edit-sede', ['sede' => $sede, 'regimenes_simplificados'=> $regimenes_simplificados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required','string'],
            'direccion' => ['required','string'],
            'telefono' => ['required','string'],
            'ciudad' => ['required','string'],
            'regimen_simplificado' => ['required']
        ]);

        $sede = Sede::find($id);
        $sede->nombre = $request->nombre;
        $sede->direccion = $request->direccion;
        $sede->telefono = $request->telefono;
        $sede->ciudad = $request->ciudad;
        $sede->regimen_simplificado_id = $request->regimen_simplificado;
        $sede->save();

        return redirect('/sedes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
