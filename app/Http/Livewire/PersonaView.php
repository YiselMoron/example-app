<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;

class PersonaView extends Component
{
    public function render()
    {
        $personas = Persona::all();
        return view('livewire.persona-view', compact('personas'));
    }
}
