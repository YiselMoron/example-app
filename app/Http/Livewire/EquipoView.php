<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use Livewire\Component;

class EquipoView extends Component
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
        $this->dispatchBrowserEvent('openModalEdit');
    }

    public function render()
    {
        $equipos = Equipo::all();
        return view('livewire.equipo-view', compact('equipos'));
    }
}
