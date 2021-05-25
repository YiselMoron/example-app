<?php

namespace App\Http\Livewire;

use App\Models\SolicitudEquipo;
use Livewire\Component;

class SolicitudEquipoView extends Component
{
    public function render()
    {
        $SolicitudEquipos=SolicitudEquipo::all();
        return view('livewire.solicitud-equipo-view',compact('SolicitudEquipos'));
    }
}
