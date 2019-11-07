<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cierre_inv extends Model
{
    protected $table = "cierre_inv";
    protected $fillable = ['fecha', 'producto_id', 'cantidad', 'costo', 'id_mod'];
    protected $guarded = ['id'];
}
