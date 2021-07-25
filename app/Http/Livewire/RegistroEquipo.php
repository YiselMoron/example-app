<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\Marca;
use App\Models\TipoEquipo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class RegistroEquipo extends Component
{
    public $VEnombre;
    public $VEstock;
    public $VEmarca;
    public $VEtipoEquipo;
    public $idX;

    protected $listeners = [
        'getDataId'
    ];

    public function getDataId($modelId){
        $this->idX = $modelId;
        $equipo = Equipo::where('id', $modelId)->first();
        $this->VEnombre = $equipo->nombre;
        $this->VEstock = $equipo->Stock;
        $this->VEmarca = $equipo->idMarca;
        $this->VEtipoEquipo = $equipo->idTipoEquipo;
    }

    public function save(){
        $this->validate([
            'VEnombre'=> 'required',
            'VEstock'=> 'required',
            'VEmarca'=> 'required',
            'VEtipoEquipo'=> 'required',

        ]);
        DB::beginTransaction();
        try{
                if ($this->idX) {
                    $editE = Equipo::find($this->idX);
                    $editE->nombre = $this->VEnombre;
                    $editE->Stock = $this->VEstock;
                    $editE->idMarca = $this->VEmarca;
                    $editE->idTipoEquipo = $this->VEtipoEquipo;
                    $editE->save();
                    $this->idX = null;
                } else {
                    $busqueda = Equipo::where('nombre', $this->VEnombre)->first();
                    if($busqueda){
                        $contar = ($busqueda->Stock+$this->VEstock);
                        $equipo = Equipo::find($busqueda->id);
                        $equipo->Stock = $contar;
                        $equipo->save();
                    }else{
                        $equipo = new Equipo;
                        $equipo->nombre = $this->VEnombre;
                        $equipo->Stock = $this->VEstock;
                        $equipo->idMarca = $this->VEmarca;
                        $equipo->idTipoEquipo = $this->VEtipoEquipo;
                        $equipo->save();
                    }
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
        $marcas=Marca::all();
        $tipoEquipos=TipoEquipo::all();
        return view('livewire.registro-equipo',compact('marcas','tipoEquipos'));
    }
}
