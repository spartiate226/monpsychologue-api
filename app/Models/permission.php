<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    function roles(){
        return $this->belongsToMany(role::class,'roles','permission_id','id');
    }
}
