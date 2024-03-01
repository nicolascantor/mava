<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Elemento;
use App\Data\ElementOrderData;

class ShowElemento extends Component
{
    use WithPagination;

    public $searchName, $searchReferens;
    public $open =true;
    public $openElemeto = true;
    public $openCantidad = true;
    public $cantidad;
    public $observacion;
    public Elemento $elemento;
    public ElementOrderData $elementOrderData;


    protected $listeners = ['closeModal'=>'resetModal'];
    protected $queryString = ['searchName', 'searchReferens'];
    protected $rules = [
        'cantidad' => 'required|min:0',
    ];
    protected $messages = [
        'cantidad.required' => 'Debe ingresar una cantidad valida',
    ];

    public function resetModal(){
        $this->reset('open');
        $this->reset('searchName');
        $this->reset('searchReferens');
    }

    public function send(Elemento $elemento){
        $this->openElemeto = false;
        $this->openCantidad = false;
        $this->elemento = $elemento;
    }

    public function add(){

        $this->validate();
        $this->elementOrderData = new ElementOrderData([
            'id' => $this->elemento->id,
            'referencia' => $this->elemento->referencia,
            'nombre' => $this->elemento->nombre,
            'cantidad' => $this->cantidad,
            'observacion' => $this->observacion
        ]);

       $this->reset('cantidad');
       $this->reset('observacion');
       $this->elementOrderData->fromLivewire([]);
       $this->reset('openElemeto');
       $this->reset('openCantidad');
       $this->resetModal();
       $this->emit('elementAdd', $this->elementOrderData);

    }

    public function atras(){
        $this->reset('cantidad');
        $this->reset('observacion');
        $this->reset('openCantidad');
        $this->reset('searchName');
        $this->reset('searchReferens');
        $this->openElemeto = true;
    }

    public function render()
    {

        return view('livewire.show-elemento',[
                    'elementos' => Elemento::where('nombre', 'like', '%'.$this->searchName.'%')
                                            ->where('referencia', 'like', '%'.$this->searchReferens.'%')
                                            ->paginate(10),
        ]);
    }
}
