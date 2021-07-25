<?php

namespace App\Http\Livewire;

use App\Models\AsignacionEquipo;
use App\Models\AsistenciaTecnica;
use App\Models\FormularioEquipo;
use App\Models\SolicitudEquipo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PersonaAdmin extends Component
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public $prompt;

    protected $listeners = [
        'refreshParent'
    ];

    public function refreshParent(){
        $this->prompt = " ";
    }

    public function render()
    {
        $solicitudes = SolicitudEquipo::where([
            ['idPersona', Auth::user()->id],
            ['estado', '<', '2'],
        ])->get();
        $asistencias = AsistenciaTecnica::where([
            ['idPersona', Auth::user()->id],
            ['estado', '<', '2'],
        ])->get();
        $equipos = AsignacionEquipo::all();
        return view('livewire.persona-admin', compact('solicitudes', 'asistencias', 'equipos'));
    }
}
