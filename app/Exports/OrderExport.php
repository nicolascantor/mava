<?php

namespace App\Exports;

use App\Models\Pedido_has_elemento;
use App\Models\Pedido;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromView
{
    public Pedido $pedido;
    public function __construct(Pedido $pedido){
        $this->pedido = $pedido;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exportExcel.purchase-order', [
            'elementos' => Pedido_has_elemento::where('pedido_id', $this->pedido->id)->get(),
            'pedido' => $this->pedido,
        ]);
        //return Pedido_has_elemento::where('pedido_id',$this->id)->get();
    }
}
