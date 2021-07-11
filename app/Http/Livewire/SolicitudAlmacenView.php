<?php

namespace App\Http\Livewire;

use App\Models\SolicitudAlmacen;
use Livewire\Component;


class SolicitudAlmacenView extends Component
{
    public $prompt;

    protected $listeners = [
        'refreshParent'
    ];

    public function refreshParent(){
        $this->prompt = " ";
    }

    public function render()
    {

        $almacenes= SolicitudAlmacen::all();
        return view('livewire.solicitud-almacen-view',compact('almacenes'));
    }
}
