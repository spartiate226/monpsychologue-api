<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_question extends Model
{
    use HasFactory;
    protected $guarded=[];
    function  reponses(){
        return  $this->hasMany(forum_question_reponse::class,'question_id','id');
    }
}
