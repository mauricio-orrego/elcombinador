<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table = "salida";
    protected $fillable = ['cliente_id', 'factura', 'fecha', 'fecha_venci', 'forma_pago', 'estado'];
    protected $guarded = ['id'];

        public function scopeMax($query)
        {
            $query = Salida::select('select max(id) from salida limit 1');
        }

}
