<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionEquipo extends Model
{
    use HasFactory;

    protected $table='asignacionEquipo';

    public function equipo(){

        return $this->belongsTo(FormularioEquipo::class,'idFormulario');
    }
    
}
