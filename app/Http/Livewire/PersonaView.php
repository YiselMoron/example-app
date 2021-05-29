<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;

class PersonaView extends Component
{
    public $prompt;
    protected $listeners = [
        'refreshParent'
    ];
    public function refreshParent(){
        $this->prompt = " ";
    }
    public function render()
    {
        $personas = Persona::all();
        return view('livewire.persona-view', compact('personas'));
    }
}
