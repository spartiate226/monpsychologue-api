<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    use HasFactory;
    protected $guarded=[];
    function  questions(){
        return  $this->hasMany(forum_question::class);
    }
}
