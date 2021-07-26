<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\Marca;
use App\Models\PedidoEquipo;
use App\Models\SolicitudAlmacen;
use App\Models\TipoEquipo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RegistroAlmacen extends Component
{
    public $VEid;
    public $VEnombre;
    public $VAcantidadP = 1;
    public $VAcantidadR;
    public $VAfechaP;
    public $VAfechaR;
    public $VAdescripcion;
    public $VAestado;
    public $autocomplete;
    public $ocultar = 'hidden';
    public $lista = [];


    public function render()

    {
        $marcas = Marca::all();
        $tipoEquipos = TipoEquipo::all();
        return view('livewire.registro-almacen',compact('marcas','tipoEquipos'));
    }

    protected $messages = [
        'VEnombre.required' => 'Este campo es requerido.',
        'VAcantidadP.required' => 'Este campo es requerido.',
    ];

    public function save(){ //3 vacio

        DB::beginTransaction();
        try{
            if ($this->lista) {
                $fecha = new Carbon;
                $pedido = new PedidoEquipo;
                $pedido->fechaPedido = $fecha;
                $pedido->idPersona = Auth::user()->id;
                $pedido->save();
                foreach($this->lista as $item){
                    $almacen = new SolicitudAlmacen;
                    $almacen->cantidadPedido = $item['cantidad'];
                    $almacen->fechaPedido = $fecha;
                    $almacen->descripcion = $item['descripcion'];
                    $almacen->estado = 0;
                    $almacen->idPedidoEquipo = $pedido->id;
                    $almacen->idEquipo = $item['id'];
                    $almacen->save();
                }
            } else {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Intento hacer una peticion vacia, vuelva a intentarlo!!"
                ]);
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
        $this->VEnombre = null;
        $this->VAcantidadP = 1;
        $this->VAdescripcion = null;
        $this->VEid = null;
        $this->lista = [];
        $this->emit('refreshParent');

    }

    public function buscar(){

        $this->ocultar = ' ';
        $this->autocomplete = [];
        $this->autocomplete = Equipo::where('nombre', 'like', '%'.$this->VEnombre.'%')->get();

    }

    public function seleccion($id, $name){
        $this->VEid = $id;
        $this->VEnombre = $name;
        $this->ocultar = 'hidden';
    }

    public function agregar(){
        $this->validate([
            'VEnombre'=> 'required',
            'VAcantidadP'=> 'required',
        ]);

        if($this->VEid == 0){
            $a = Equipo::where('nombre', $this->VEnombre)->first();
            if($a) {
                $this->VEid = $a->id;
            } else {
                $equipo = new Equipo;
                $equipo->nombre = $this->VEnombre;
                $equipo->Stock = 0;
                $equipo->save();
                $this->VEid = $equipo->id;
            }
        }

        $this->lista[] = ['id' => $this->VEid, 'nombre' => $this->VEnombre, 'cantidad' => $this->VAcantidadP, 'descripcion' => $this->VAdescripcion];
        $this->VEnombre = null;
        $this->VAcantidadP = null;
        $this->VAdescripcion = null;
        $this->VEid = null;

    }

    public function eliminar_fila($id){
        unset($this->lista[$id]);
        $this->lista = array_values($this->lista);
    }

}
