<?php

namespace App\Http\Livewire;

use App\Models\AsistenciaTecnica;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PersonaAsistencia extends Component
{
    public $VAerror;

    public function save(){
        DB::beginTransaction();
        try {
            $asistencia = new AsistenciaTecnica;
            $asistencia->problema = $this->VAerror;
            $asistencia->idPersona = Auth::user()->id;
            $asistencia->estado = 0;
            $asistencia->save();


            DB::commit();
        }
        catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Ocurrio un error. Vulve a intentarlo mas tarde!!"
            ]);

            DB::rollBack();
        }

        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.persona-asistencia');
    }
}
