<?php

namespace App\Http\Livewire;

use App\Models\AsistenciaTecnica;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PersonaAsistencia extends Component
{
    public $VAerror;

    public function save(){
        $asistencia = new AsistenciaTecnica;
        $asistencia->problema = $this->VAerror;
        $asistencia->idPersona = Auth::user()->id;
        $asistencia->estado = 0;
        $asistencia->save();
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.persona-asistencia');
    }
}
