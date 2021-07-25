<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\PedidoEquipo;
use App\Models\SolicitudAlmacen;
use Livewire\Component;

class RegistroAlmacenAdmin extends Component
{

    public $detalles;
    public $VAcode;
    public $VAcant = [];
    public $idPedido;

    protected $listeners = [
        'getDataId'
    ];

    public function getDataId($modelId){
        $this->VAcant = [];
        $this->detalles = PedidoEquipo::where('id', $modelId)->first();
        $this->VAcode = $this->detalles->numeroAlmacen;
        foreach ($this->detalles->solicitudAlmacen as $key => $detalle) {
            $this->VAcant[] = $detalle->cantidadRecibido;
        }
        $this->idPedido = $modelId;
        $this->dispatchBrowserEvent('openModal');
    }

    public function render()
    {
        return view('livewire.registro-almacen-admin');
    }

    public function save(){
        $pedidos = PedidoEquipo::where('id', $this->idPedido)->first();
        $pedido = PedidoEquipo::find($this->idPedido);
        $pedido->numeroAlmacen = $this->VAcode;
        $pedido->save();
        foreach ($pedidos->solicitudAlmacen as $key => $detalle) {
            $item = SolicitudAlmacen::find($detalle->id);
            $item->cantidadRecibido = $this->VAcant[$key];
            $item->save();
            $equipo = Equipo::find($item->idEquipo);
            $equipo->Stock = $equipo->Stock + $this->VAcant[$key];
            $equipo->save();
        }
        $this->emit('refreshParent');
    }
}
