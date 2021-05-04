<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table='persona';
    

    public function users(){
    
        return $this->belongsTo(User::class,'IdUser');
    } 

    public function cargo(){
    
        return $this->belongsTo(Cargo::class,'IdCargo');
    } 
    public function departamento(){
    
        return $this->belongsTo(Departamento::class,'IdDepartamento');
    } 
    public function detalle_persona_equipo(){
    
        return $this->hasMany(DetallePersonaEquipo::class,'IdPersona');
    } 
    public function pedidoequipo(){
    
        return $this->hasMany(PedidoEquipo::class,'IdPersona');
    } 
    public function solicitud(){
    
        return $this->hasMany(Solicitud::class,'IdPersona');
    } 
}
