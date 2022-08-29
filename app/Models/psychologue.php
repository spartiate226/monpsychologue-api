<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class psychologue extends Model
{
    use HasFactory;
    protected $guarded=[];
    function cabinet(){
        return $this->belongsTo(cabinet::class);
    }
}
