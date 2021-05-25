<?php

namespace App\Http\Livewire;

use App\Models\AsignacionEquipo;
use Livewire\Component;

class AsignacionEquipoView extends Component
{
    public function render()
    {
        $AsignacionEquipos=AsignacionEquipo::all();
        return view('livewire.asignacion-equipo-view',compact('AsignacionEquipos'));
    }
}
