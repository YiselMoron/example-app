<?php

namespace App\Http\Livewire;

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
        /* $this->idPedido_edit = $modelId;
        $chemical = Mechanic::find($this->idPedido_edit);
        $this->lote = $chemical->lote->code ;
        $this->masa = $chemical->masa_lineal ;
        $this->fy = $chemical->fy ;
        $this->fx = $chemical->fx ;
        $this->a = $chemical->a ;
        $this->re = $chemical->re ;
        $this->d = $chemical->d ;
        $this->altura = $chemical->altura ;
        $this->espaciamiento = $chemical->espaciamiento ;
        $this->gap = $chemical->gap ;
        $this->angulo = $chemical->angulo ; */
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
        }
        $this->emit('refreshParent');
    }
}
