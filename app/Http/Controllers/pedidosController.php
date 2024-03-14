<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido_has_elemento;
use App\Models\Pedido;

class pedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pedidos.pedidos',['pedidos' => Pedido::where('usuario_id', Auth::id())->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedidos.create-order');
    }

    public function show(Pedido $pedido){
        $elementos = Pedido_has_elemento::where('pedido_id',$pedido->id)->get();

        return view('pedidos.show-order', ['elementos' => $elementos, 'pedido' => $pedido]);

    }

}
