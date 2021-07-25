<?php

namespace App\Http\Livewire;

use App\Models\AsistenciaTecnica;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Mantenimiento;
use App\Models\Rol;
use App\Models\Soporte;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RegistroSoporte extends Component
{
    public $idSolicitud;
    public $idTipo;
    public $tipo;
    public $VAsolucion;
    protected $listeners = [
        'getDataId'
    ];

    public function getDataId($idTipo, $idSolicitud, $tipo){
        $this->idTipo = $idTipo;
        $this->idSolicitud = $idSolicitud;
        $this->tipo = $tipo;
        $this->dispatchBrowserEvent('openModal');
    }

    public function save(){
        DB::beginTransaction();
        try {
            if ($this->tipo == 'mantenimiento') {
                $item = AsistenciaTecnica::find($this->idSolicitud);
                $item->solucion = $this->VAsolucion;
                $item->estado = 2;
                $item->save();
                $val = Mantenimiento::find($this->idTipo);
                $val->fechaFin = new Carbon;
                $val->save();
            } else {
                $item = AsistenciaTecnica::find($this->idSolicitud);
                $item->solucion = $this->VAsolucion;
                $item->estado = 2;
                $item->save();
                $val = Soporte::find($this->idTipo);
                $val->horaFin = date('H:i:s');
                $val->save();
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
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.registro-soporte');
    }
}
