<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ELemento;

class ShowElemento extends Component
{

    public function render()
    {

        return view('livewire.show-elemento',[
                    'elementos' => Elemento::all(),
        ]);
    }
}
