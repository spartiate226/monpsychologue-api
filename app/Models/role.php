<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $guarded=[];
    function permissions(){
        return $this->belongsToMany(role::class,'roles','permission_id','id');
    }
}
