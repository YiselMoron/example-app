<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\PedidoEquipo;
use App\Models\SolicitudAlmacen;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistroAlmacen extends Component
{
    public $VAcantidadP;
    public $VAcantidadR;
    public $VAfechaP;
    public $VAfechaR;
    public $VAdescripcion;
    public $VAestado;

    public function save(){ //3 vacio
        $this->validate([
            'VAcantidadP'=> 'required',
            'VAcantidadR'=> 'required',
            'VAfechaP'=> 'required',
            'VAfechaR'=> 'required',
            'VAdescripcion'=> 'required',
            'VAestado'=> 'required',
            
        ]);
        DB::beginTransaction();
        try{
                // $busqueda = Equipo::where('nombre', $this->VEnombre)->first();
                // if($busqueda){
                //     $contar = ($busqueda->Stock+$this->VEstock);
                //     $equipo = Equipo::find($busqueda->id);
                //     $equipo->Stock = $contar;
                //     $equipo->save();
                // }else{
                //     $equipo = new Equipo;
                //     $equipo->nombre = $this->VEnombre;
                //     $equipo->Stock = $this->VEstock;
                //     $equipo->idMarca = $this->VEmarca;
                //     $equipo->idTipoEquipo = $this->VEtipoEquipo;
                //     $equipo->save();
                // }
                $almacen = new SolicitudAlmacen;
            $almacen->cantidadPedido = $this->VAcantidadP;
            $almacen->cantidadRecibida = $this->VAcantidadR;
            $almacen->fechaPedido = $this->VAfechaP;
            $almacen->fecharecibido = $this->VAfechaR;
            $almacen->descripcion = $this->VAdescripcion;
            $almacen->estado = $this->VAestado;
            $almacen->save();
                DB::commit();
            }
            catch(\Exception $e){
            DB::rollBack();
        }
        $this->emit('refreshParent');
      }
    public function render()

    {
        
        $almacenes = SolicitudAlmacen::all();
        return view('livewire.registro-almacen',compact('almacenes'));
    }
}
