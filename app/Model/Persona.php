<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";
    protected $fillable = ['id', 'nombre', 'apellido', 'documento', 'dv', 'tipo_doc_id', 'direccion', 'ciudad_id', 'telefono', 'celular', 'tipo_per_id'];
    protected $guarded = ['id'];

    public function scopeName($query, $q)
    {
        if($q != "")
        {
            $query->where('nombre', "LIKE", "%$q%" );
        }
    
    }

}
