<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table='mantenimiento';

    public function asistenciaTecnica()
    {
        return $this->belongsTo(AsistenciaTecnica::class,'idAsistencia');
    }


}
