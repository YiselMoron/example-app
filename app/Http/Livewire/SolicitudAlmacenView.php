<?php

namespace App\Http\Livewire;

use App\Models\PedidoEquipo;
use App\Models\SolicitudAlmacen;
use Livewire\Component;


class SolicitudAlmacenView extends Component
{
    public $prompt;
    public $detalles;

    protected $listeners = [
        'refreshParent'
    ];

    public function refreshParent(){
        $this->prompt = " ";
    }

    public function detalle_pedido( $id ){
        $this->detalles = PedidoEquipo::where('id', $id)->first();
        $this->dispatchBrowserEvent('openModal');
    }

    public function render()
    {

        $almacenes= PedidoEquipo::all();
        return view('livewire.solicitud-almacen-view',compact('almacenes'));
    }
}
