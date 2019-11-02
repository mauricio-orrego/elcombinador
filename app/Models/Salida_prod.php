<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida_prod extends Model
{
    protected $table = "salida_prod";
    protected $fillable = ['salida_id', 'producto_id', 'cantidad', 'valor'];
    protected $guarded = ['id'];
}
