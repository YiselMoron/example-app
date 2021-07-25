<?php

namespace App\Http\Livewire;

use App\Models\AsignacionEquipo;
use App\Models\Equipo;
use App\Models\PedidoEquipo;
use App\Models\SolicitudAlmacen;
use App\Models\SolicitudEquipo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RegistroSolicitudEquipo extends Component
{
    public $getId;
    public $detalle;
    public $VAestado;
    public $level = [];
    public $lista = [];
    public $serie = [];

    protected $listeners = [
        'getDataId'
    ];

    public function getDataId($getId){
        $this->getId = $getId;
        $this->detalle = SolicitudEquipo::where('id', $getId)->first();
        foreach ($this->detalle->folmularioEquipo as $item) {
            $this->serie[] = 0;
            $this->level[] = 0;
        }
        $this->dispatchBrowserEvent('openModal');
    }

    public function procesar($estado){
        DB::beginTransaction();
        try {
            foreach ($this->detalle->folmularioEquipo as $key => $item) {
                $idX = Equipo::where('id', $item->idEquipo)->first();
                if ($idX->Stock == 0) {
                    $this->lista[] = ['id' => $item->idEquipo, 'cantidad' => $item->cantidad];
                }
            }

            if ($this->lista) {
                $fecha = new Carbon;
                $pedido = new PedidoEquipo();
                $pedido->fechaPedido = $fecha;
                $pedido->idPersona = Auth::user()->id;
                $pedido->save();
                foreach($this->lista as $item){
                    $almacen = new SolicitudAlmacen();
                    $almacen->cantidadPedido = $item['cantidad'];
                    $almacen->fechaPedido = $fecha;
                    $almacen->estado = 0;
                    $almacen->idPedidoEquipo = $pedido->id;
                    $almacen->idEquipo = $item['id'];
                    $almacen->save();
                }

                $this->dispatchBrowserEvent('alert',[
                    'type'=>'info',
                    'message'=>"Algunos articulos no estan en stock. Se ha realizado un pedido a almacen!!"
                ]);
            } else {
                $solicitud = SolicitudEquipo::find($this->getId);
                $solicitud->estado = $estado;
                $solicitud->save();
                $code = AsignacionEquipo::where('serie', $solicitud->persona->departamento->nombre)->count();

                if ($estado == 2) {
                    foreach ($this->detalle->folmularioEquipo as $key => $item) {
                        $idX = Equipo::where('id', $item->idEquipo)->first();
                        $equipo = Equipo::find($item->idEquipo);
                        $equipo->Stock = $equipo->Stock - $item->cantidad;
                        $equipo->save();
                        $i = $code + 1;
                        if ($this->level[$key] == 'true') {
                            $asignar = new AsignacionEquipo;
                            $asignar->idFormulario = $item->id;
                            $asignar->serie = $this->serie[$key];
                            $asignar->codigo = 'SIS'.$i;
                            $asignar->fechaEntrega = new Carbon;
                            $asignar->save();
                            $code = $i;
                        } else {
                            $asignar = new AsignacionEquipo;
                            $asignar->idFormulario = $item->id;
                            $asignar->serie = $this->serie[$key];
                            $asignar->fechaEntrega = new Carbon;
                            $asignar->save();
                        }
                    }
                }
            }
            DB::commit();
        }
        catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Ocurrio un error. Vulve a intentarlo mas tarde!!"
            ]);

            DB::rollBack();
        }

        $this->emit('refreshParent');
    }

    public function levelClicked($a){
        $this->level[$a] = 'true';
    }

    public function render()
    {
        return view('livewire.registro-solicitud-equipo');
    }
}
