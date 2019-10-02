<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_doc extends Model
{
    protected $table = "tipo_doc";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
