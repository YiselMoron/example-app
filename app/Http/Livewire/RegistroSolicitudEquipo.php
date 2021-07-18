<?php

namespace App\Http\Livewire;

use App\Models\AsignacionEquipo;
use App\Models\SolicitudEquipo;
use Carbon\Carbon;
use Livewire\Component;

class RegistroSolicitudEquipo extends Component
{
    public $getId;
    public $detalle;
    
    protected $listeners = [
        'getDataId'
    ];

    public function getDataId($getId){
        $this->getId = $getId;
        $this->detalle = SolicitudEquipo::where('id', $getId)->first();
        $this->dispatchBrowserEvent('openModal');
    }

    public function procesar($estado){
        $solicitud = SolicitudEquipo::find($this->getId);
        $solicitud->estado = $estado;
        $solicitud->save();
        $code = AsignacionEquipo::where('serie', $solicitud->persona->departamento->nombre)->count();
        if ($estado == 2) {
            $asignar = new AsignacionEquipo;
            $asignar->idFormulario = $this->getId;
            $asignar->serie = $solicitud->persona->departamento->nombre;
            $asignar->codigo = $code + 1;
            $asignar->fechaEntrega = new Carbon;
            $asignar->save();
        }
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.registro-solicitud-equipo');
    }
}
