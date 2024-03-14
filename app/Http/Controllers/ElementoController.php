<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Imports\ElementImport;
use App\Mail\SendOrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;





class ElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('configsystem\elementos', [
            'elementos' => Elemento::paginate(20),
        ]);
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

    public function create_masivo(): View
    {
        return view('configsystem.create-elementos-masivo');
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
            'valor_venta_publico' => ['nullable'],
            'valor_venta_sede' => ['nullable']
        ]);

        $elemento = new Elemento;
        $elemento->referencia = strtoupper($request->referencia);
        $elemento->nombre = strtoupper($request->nombre);
        $elemento->unidad_medida = $request->unidad_medida;
        $elemento->valor_venta_publico = $request->valor_venta_publico;
        $elemento->valor_venta_sede = $request->valor_venta_sede;

        $elemento->save();

        return Redirect::route('elementos');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('configsystem.edit-element', [
                'elemento' => Elemento::find($id),
        ]);
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
            'referencia' => ['required','string','max:9','min:9', 'unique:elementos,referencia,'.$id],
            'nombre' => ['required', 'string'],
            'unidad_medida' => ['string'],
            'valor_venta_publico' => ['nullable'],
            'valor_venta_sede' => ['nullable']
        ]);

        $elemento = Elemento::find($id);

        $elemento->referencia = $request->referencia;
        $elemento->nombre = $request->nombre;
        $elemento->unidad_medida = $request->unidad_medida;
        $elemento->valor_venta_publico = $request->valor_venta_publico;
        $elemento->valor_venta_sede = $request->valor_venta_sede;

        $elemento->save();

        return Redirect::route('elementos');
    }


    public function store_masivo(Request $request){

        $request->validate([
            'elementos' => ['required','file','mimes:xlsx'],
        ]);

        $file = $request->file('elementos');

        $import = new ElementImport();
        $import->import($file);


        return view('configsystem.create-elementos-masivo',[
            'failures' => $import->failures(),
        ]);
    }
}
