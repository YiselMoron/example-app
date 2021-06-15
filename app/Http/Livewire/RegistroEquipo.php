<?php

namespace App\Http\Livewire;

use App\Models\Marca;
use App\Models\TipoEquipo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
            'VEtipoequipo'=> 'required',

        ]);
    }

    public function render()
    {
        $marcas=Marca::all();
        $tipoEquipos=TipoEquipo::all();
        return view('livewire.registro-equipo',compact('marcas','tipoEquipos'));
    }
}
