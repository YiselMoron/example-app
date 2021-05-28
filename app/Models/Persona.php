<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table='persona';

    public function asistenciaTecnica()
    {
        return $this->hasMany(AsistenciaTecnica::class,'idPersona');
    }

    public function solicitudEquipo()
    {
        return $this->hasMany(SolicitudEquipo::class,'idPersona');
    }

    public function pedidoEquipo()
    {
        return $this->hasMany(PedidoEquipo::class,'idPersona');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'idUser');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class,'idCargo');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class,'idDepartamento');
    }


}
