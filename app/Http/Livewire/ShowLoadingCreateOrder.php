<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowLoadingCreateOrder extends Component
{

    protected $listeners =['showLoading'];

    public $creando = true;

    public function showLoading(){
        $this->creando = false;
        $this->emit('store');

    }

    public function render()
    {
        return view('livewire.show-loading-create-order');
    }
}
