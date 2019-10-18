<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class entrada_prod extends Model
{
    protected $table = "entrada_prod";
    protected $fillable = ['entrada_id', 'producto_id', 'cantidad', 'valor'];
    protected $guarded = ['id'];
}
