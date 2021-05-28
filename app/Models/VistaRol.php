<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaRol extends Model
{
    use HasFactory;

    protected $table='vistaRol';

    public function vista()
    {
        return $this->belongsTo(Vista::class,'idVista');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class,'idRol');
    }

}
