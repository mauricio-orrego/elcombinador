<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = "bodega";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
