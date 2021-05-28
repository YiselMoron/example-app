<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vista extends Model
{
    use HasFactory;

    protected $table='vista';

    public function vistaRol()
    {
        return $this->hasMany(VistaRol::class,'idVista');
    }

}
