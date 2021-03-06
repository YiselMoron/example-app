<?php

namespace App\Http\Livewire;

use App\Models\SolicitudEquipo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SolicitudEquipoView extends Component
{
    public $prompt;

    protected $listeners = [
        'refreshParent'
    ];

    public function refreshParent(){
        $this->prompt = " ";
    }

    public function selectItem($id){
        $this->emit('getDataId', $id);
    }

    public function render()
    {
        $SolicitudEquipos=SolicitudEquipo::where('idSoporte', Auth::user()->id)->orderBy('estado')->get();
        return view('livewire.solicitud-equipo-view',compact('SolicitudEquipos'));
    }
}
