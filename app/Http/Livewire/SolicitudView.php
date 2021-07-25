<?php

namespace App\Http\Livewire;

use App\Models\AsistenciaTecnica;
use App\Models\Mantenimiento;
use App\Models\Soporte;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SolicitudView extends Component
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
        $asistencias = AsistenciaTecnica::where('idSoporte', Auth::user()->id)->get();
        return view('livewire.solicitud-view', compact('asistencias'));
    }

    public function diagnostico($id, $tipo){
        DB::beginTransaction();
        try{
            if ($tipo == 'soporte') {
                $soporte = new Soporte;
                $soporte->idAsistencia = $id;
                $soporte->horaInicio = date('H:i:s');
                $soporte->save();
            } else {
                $mantenimiento = new Mantenimiento;
                $mantenimiento->idAsistencia = $id;
                $mantenimiento->fechaInicio = new Carbon();
                $mantenimiento->save();
            }
            DB::commit();
        }
        catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Ocurrio un error. Vulve a intentarlo mas tarde!!"
            ]);

            DB::rollBack();
        }
    }

    public function finalizar($id, $solicitud, $tipo){
        $this->emit('getDataId', $id, $solicitud, $tipo);
    }
}
