<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Simplified_regimen;
use Illuminate\Http\RedirectResponse;

class RegimenSimplificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): view
    {
        $regimenes_simplificados = Simplified_regimen::all();
        return view('configsystem.regimenes-simplificados', ['regimenes_simplificados'=>$regimenes_simplificados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
         return view('configsystem.create-regimensimplificado');
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
            'nit' => ['required','string','unique:simplified_regimens,nit']
        ]);

        $new_rs = new Simplified_regimen;

        $new_rs->nombre = $request->nombre;
        $new_rs->nit = $request->nit;
        $new_rs->save();

        return redirect('/regimensimplificado');
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
        $regimen_simplificado = Simplified_regimen::find($id);

        return view('configsystem.edit-regimen-simplificado', ['regimen_simplificado' => $regimen_simplificado]);
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
            'nit' => ['required','string','unique:simplified_regimens,nit,'.$id]
        ]);



        $regimen_simplificado = Simplified_regimen::find($id);

        $regimen_simplificado->nombre = $request->nombre;
        $regimen_simplificado->nit = $request->nit;
        $regimen_simplificado->update();

        return redirect('/regimensimplificado');
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
