<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Prueva extends Component
{
    public $vari = 'hola';
    public function alerta(){
        
        $this->vari=' a';
    }
    public function render()
    {
        
        return view('livewire.prueva');
    }
}
