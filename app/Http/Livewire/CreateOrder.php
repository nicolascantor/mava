<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

use App\Models\Elemento;

class CreateOrder extends Component
{
    protected $listeners = ['elementAdd'];
    public $elementosSeleccionados = [];

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

    public function render()
    {
        return view('livewire.create-order');
    }
}
