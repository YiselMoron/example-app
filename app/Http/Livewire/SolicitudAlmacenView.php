<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\PedidoEquipo;
use App\Models\SolicitudAlmacen;
use App\Models\TipoEquipo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SolicitudAlmacenView extends Component
{
    
    public $VAcantidadP;
    public $VAcantidadR;
    public $VAfechaP;
    public $VAfechaR;
    public $VAdescripcion;
    public $VAestado;

    // public function save(){ //3 vacio
    //     $this->validate([
    //         'VPnombreCompleto'=> 'required',
    //         'VPcargo'=> 'required',
    //         'VPdepartamento'=> 'required',
    //         'VPcelular'=> 'required',
    //         'VPemail'=> 'required',
    //         'VPpassword'=> 'required',
    //         'VProl'=> 'required',
    //     ]);
    //     DB::beginTransaction();
    //     try{
    //         $user = new User;
    //         $user->name = $this->VPnombreCompleto;
    //         $user->email = $this->VPemail;

    //         $user->password = Hash::make($this->VPpassword);
    //         $user->idRol = $this->VProl;
    //         $user->save();
    //         $people = new Persona;
    //         $people->nombreCompleto = $this->VPnombreCompleto;
    //         $people->celular = $this->VPcelular;
    //         $people->idDepartamento = $this->VPdepartamento;
    //         $people->idCargo = $this->VPcargo;
    //         $people->idUser = $user->id;
    //         $people->save();

    //         DB::commit();
    //     }
    //     catch(\Exception $e){
    //         DB::rollBack();
    //     }
    //     $this->emit('refreshParent');
    //   }
    public function render()
    {
        // $equipos = Equipo::all();
        // $pedidoEquipos = PedidoEquipo::all();
         $almacenes= SolicitudAlmacen::all();
        return view('livewire.solicitud-almacen-view',compact('almacenes'));
    }
}
