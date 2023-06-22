<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Elemento;

class ElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('configsystem.create-elements');
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
            'referencia' => ['required','string','max:9','min:9', 'unique:elementos,referencia'],
            'nombre' => ['required', 'string'],
            'unidad_medida' => ['string'],
            'valor_venta_publico' => ['decimal:2'],
            'valor_venta_sede' => ['decimal:2']
        ]);

        $elemento = new Elemento;
        $elemento->referencia = strtoupper($request->referencia);
        $elemento->nombre = strtoupper($request->nombre);
        $elemento->unidad_medida = ($elemento->unidad_medida != null) ? $request->unidad_medida : null;
        $elemento->valor_venta_publico = ($elemento->valor_venta_publico != null) ? $request->valor_venta_publico : null;
        $elemento->valor_venta_sede = ($elemento->valor_venta_sede != null) ? $request->valor_venta_sede : null;

        $elemento->save();



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
        //
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
        //
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
