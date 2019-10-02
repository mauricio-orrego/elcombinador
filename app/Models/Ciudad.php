<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudad";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
