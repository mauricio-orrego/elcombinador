<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depto extends Model
{
    protected $table = "depto";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
