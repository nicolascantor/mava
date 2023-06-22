<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','direccion','telefono','ciudad','regimen_simplificado_id'];


    //relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function regimen_simplificado(){
    return $this->belongsTo('App\Models\Simplified_regimen');
    }
}
