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

    public function scopeIdprov($query, $proveedor_id)
    {
        if($proveedor_id != "")
        {
            $query->where('id', "$proveedor_id" );
        }
    
    }

    public function scopeProv($query, $busprov)
    {
        if($busprov != "")
        {
            $query->where('nombre', "LIKE", "%$busprov%" )
                  ->where('tipo_per_id','1');
        }
        else
        {
            $query->where('tipo_per_id','1');
            
        }
    
    }

    public function scopeClie($query, $busprov)
    {
        if($busprov != "")
        {
            $query->where('nombre', "LIKE", "%$busprov%" )
                  ->where('tipo_per_id','2');
        }
        else
        {
            $query->where('tipo_per_id','2');
            
        }
    
    }
}
