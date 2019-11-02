<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "producto";
    protected $fillable = ['nombre', 'costo', 'valorventa', 'bodega_id', 'categoria_id'];
    protected $guarded = ['id'];

    public function scopeProd($query, $busprod)
    {
        if($busprod != "")
        {
            $query->where('nombre', "LIKE", "%$busprod%" );
        }    
    }
}