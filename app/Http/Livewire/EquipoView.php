<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use Livewire\Component;

class EquipoView extends Component
{
    public function render()
    {
        $equipos = Equipo::all();
        return view('livewire.equipo-view', compact('equipos'));
    }
}
