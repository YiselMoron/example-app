<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\Marca;
use App\Models\TipoEquipo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class RegistroEquipo extends Component
{
    public $VEnombre;
    public $VEstock;
    public $VEmarca;
    public $VEtipoEquipo;

    public function save(){
        $this->validate([
            'VEnombre'=> 'required',
            'VEstock'=> 'required',
            'VEmarca'=> 'required',
            'VEtipoEquipo'=> 'required',

        ]);
        $busqueda = Equipo::where('nombre', $this->VEnombre)->first();
        if($busqueda){
            $contar = ($busqueda->Stock+$this->VEstock);
            $equipo = Equipo::find($busqueda->id);
            $equipo->Stock = $contar;
            $equipo->save();
        }else{
            $equipo = new Equipo;
            $equipo->nombre = $this->VEnombre;
            $equipo->Stock = $this->VEstock;
            $equipo->idMarca = $this->VEmarca;
            $equipo->idTipoEquipo = $this->VEtipoEquipo;
            $equipo->save();
        }

    }

    public function render()
    {
        $marcas=Marca::all();
        $tipoEquipos=TipoEquipo::all();
        return view('livewire.registro-equipo',compact('marcas','tipoEquipos'));
    }
}
