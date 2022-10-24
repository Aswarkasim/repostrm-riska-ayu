<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengampuh extends Model
{
    use HasFactory;

    protected $guarded = [];

    function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}
