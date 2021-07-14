<?php

namespace App\Http\Livewire;

use App\Models\PedidoEquipo;
use Livewire\Component;

class AlmacenAdmin extends Component
{

    public $detalles;
    public $prompt;

    protected $listeners = [
        'refreshParent'
    ];

    public function refreshParent(){
        $this->prompt = " ";
    }

    public function render()
    {
        $almacenes= PedidoEquipo::all();
        return view('livewire.almacen-admin', compact('almacenes'));
    }

    public function selectItem($id){
        $this->emit('getDataId', $id);
    }
}
