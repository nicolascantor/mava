<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Elemento;
use App\Models\Pedido;
use App\Models\Pedido_has_elemento;
use App\Mail\SendOrderMail;



class CreateOrder extends Component
{
    protected $listeners = ['elementAdd'];

    public $elementosSeleccionados = [];
    public $observacionesGenerales = null;

    public function mount()
    {
        $this->elementosSeleccionados = collect([]);
    }

    public function elementAdd($elemento){
        //dd($elemento['items']['id']);
        $this->emit('closeModal');
        $this->elementosSeleccionados->push([
            'id' => $elemento['items']['id'],
            'referencia' => $elemento['items']['referencia'],
            'nombre' => $elemento['items']['nombre'],
            'cantidad' => $elemento['items']['cantidad'],
            'observacion' => $elemento['items']['observacion']
        ]);
    }

    public function deleteElement($key){
        $this->elementosSeleccionados->pull($key);
    }

    public function save(){

        if(!$this->elementosSeleccionados->isEmpty()){

            $pedido = new Pedido();

            $pedido->fecha = Carbon::now();
            $pedido->estado = 'enviado';
            $pedido->observaciones = $this->observacionesGenerales;
            $pedido->usuario_id = Auth::user()->id;

            $pedido->save();

            foreach($this->elementosSeleccionados as $elementoSeleccionado){
                $pedido_has_elemento = new Pedido_has_elemento();
                $pedido_has_elemento->pedido_id = $pedido->id;
                $pedido_has_elemento->elemento_id = $elementoSeleccionado['id'];
                $pedido_has_elemento->cantidad = $elementoSeleccionado['cantidad'];
                $pedido_has_elemento->observacion = $elementoSeleccionado['observacion'];
                $pedido_has_elemento->save();
            }

            $this->reset('observacionesGenerales');

            $response = Mail::to('nicolascantor103@gmail.com')->send(new SendOrderMail(Auth::user()->nombre, 'Mensaje de prueba'));
        }else{

        }


    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
