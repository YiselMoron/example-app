<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\FormularioEquipo;
use App\Models\PedidoEquipo;
use App\Models\SolicitudEquipo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PersonaEquipo extends Component
{
    public $VEid;
    public $VEnombre;
    public $VAcantidadP = 1;
    public $VAcantidadR;
    public $VAfechaP;
    public $VAfechaR;
    public $VAjustificacion;
    public $VAestado;
    public $autocomplete;
    public $ocultar = 'hidden';
    public $lista = [];

    protected $messages = [
        'VEnombre.required' => 'Este campo es requerido.',
        'VAcantidadP.required' => 'Este campo es requerido.',
    ];

    public function save(){
        DB::beginTransaction();
        try{
            if($this->lista){
                $fecha = new Carbon;
                $pedido = new SolicitudEquipo;
                $pedido->fechaSolicitud = $fecha;
                $pedido->idPersona = Auth::user()->id;
                $pedido->estado = 0;
                $pedido->save();
                foreach($this->lista as $item){
                    $almacen = new FormularioEquipo;
                    $almacen->cantidad = $item['cantidad'];
                    $almacen->justificacion = $item['descripcion'];
                    $almacen->idSolicitud = $pedido->id;
                    $almacen->idEquipo = $item['id'];
                    $almacen->save();
                }
            }

            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }
        $this->VEnombre = null;
        $this->VAcantidadP = 1;
        $this->VAjustificacion = null;
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
        DB::beginTransaction();
        try {
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
        }
        catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Ocurrio un error. Vulve a intentarlo mas tarde!!"
            ]);

            DB::rollBack();
        }

        $this->lista[] = ['id' => $this->VEid, 'nombre' => $this->VEnombre, 'cantidad' => $this->VAcantidadP, 'descripcion' => $this->VAjustificacion];
        $this->VEnombre = null;
        $this->VAcantidadP = null;
        $this->VAjustificacion = null;
        $this->VEid = null;

    }

    public function render()
    {
        return view('livewire.persona-equipo');
    }


    public function eliminar_fila($id){
        unset($this->lista[$id]);
        $this->lista = array_values($this->lista);
    }
}
