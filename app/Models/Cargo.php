<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model 
{
    use HasFactory;
    protected $table='cargo';
    
    public function persona(){
    
        return $this->hasMany(Persona::class,'IdCargo');
    } 
}
