<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_per extends Model
{
    protected $table = "tipo_per";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
