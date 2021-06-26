<?php

namespace App\Http\Livewire;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistroPersonaView extends Component
{

    //2
    public $VPnombreCompleto;
    public $VPcargo;
    public $VPdepartamento;
    public $VPcelular;
    public $VPemail;
    public $VPpassword;
    public $VProl;

    public function save(){ //3 vacio 6 validacion
        $this->validate([
            'VPnombreCompleto'=> 'required',
            'VPcargo'=> 'required',
            'VPdepartamento'=> 'required',
            'VPcelular'=> 'required',
            'VPemail'=> 'required',
            'VPpassword'=> 'required',
            'VProl'=> 'required',
        ]);
//7
        $user = new User;
        $user->name = $this->VPnombreCompleto;
        $user->email = $this->VPemail;
         
        $user->password = Hash::make($this->VPpassword);
        $user->idRol = $this->VProl;
        $user->save();
        $people = new Persona;
        $people->nombreCompleto = $this->VPnombreCompleto;
        $people->celular = $this->VPcelular;
        $people->idDepartamento = $this->VPdepartamento;
        $people->idCargo = $this->VPcargo;
        $people->idUser = $user->id;
        $people->save();

        // DB::beginTransaction();
        // try{

        //     $item = new User;
        //     $item->name = $this->VPnombreCompleto;
        //     $item->email = $this->VPemail;
        //     $item->password = $this->VPpassword;
        //     $item->idRol = $this->VProl;
        //     $item->save();
        //     $people = new Persona;
        //     $people->nombreCompleto = $this->VPnombreCompleto;
        //     $people->celular = $this->VPcelular;
        //     $people->idDepartamento = $this->VPdepartamento;
        //     $people->idCargo = $this->VPcargo;
        //     $people->idUser = $item->id;
        //     $people->save();
        //     DB::commit();
        // }
        // catch(\Exception $e){
        //     DB::rollBack();

        // }
    }

    public function render() //1
    {
        $cargos=Cargo::all();
        $departamentos=Departamento::all();
        $roles=Rol::all();
        return view('livewire.registro-persona-view',compact('cargos','departamentos','roles'));
    }
}
