<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Registrosoporte extends Component
{
    public function render()
    {

        $departamentos=Departamento::all();

        return view('livewire.registrosoporte', compact('Departamentos'));
    }
}
