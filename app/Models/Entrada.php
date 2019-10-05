<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = "entrada";
    protected $fillable = ['proveedor_id', 'factura', 'fecha', 'fecha_venci', 'forma_pago', 'estado', 'valor', 'iva'];
    protected $guarded = ['id'];

}

