<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bajar extends Model
{
    use HasFactory;

    protected $guarded = [];

    function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}
