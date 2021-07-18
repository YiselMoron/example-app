<?php

namespace App\Http\Livewire;

use App\Models\AsistenciaTecnica;
use App\Models\SolicitudEquipo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexView extends Component
{
    public function render()
    {
        $solicitudes = SolicitudEquipo::where('estado', '0')->get();
        $asistencias = AsistenciaTecnica::where('estado', '0')->get();
        return view('livewire.index-view', compact('solicitudes', 'asistencias'));
    }

    public function procesarSolicitud($id, $tipo){
        if($tipo == 'soporte'){
            $asistencia = AsistenciaTecnica::find($id);
            $asistencia->idSoporte = Auth::user()->id;
            $asistencia->estado = 1;
            $asistencia->save();
        }else{
            $equipo = SolicitudEquipo::find($id);
            $equipo->idSoporte = Auth::user()->id;
            $equipo->estado = 1;
            $equipo->save();
        }
        
    }
}
