<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_has_elemento extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id','elmento_id','cantidad', 'observacion'];

    public function elemento(){
        return $this->belongsTo('App\Models\Elemento');
    }
}
