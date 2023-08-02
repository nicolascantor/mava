<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;

    protected $fillable = ['referencia', 'nombre','unidad_medida','valor_venta_publico','valor_venta_sede'];



}
