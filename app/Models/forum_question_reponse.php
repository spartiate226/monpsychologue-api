<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_question_reponse extends Model
{
    use HasFactory;
    protected $guarded=[];
    function question(){
        return $this->belongsTo(forum_question::class,'question_id','id');
    }
    function reponseto(){
        return $this->belongsTo(forum_question_reponse::class,'reponse_id','id');
    }
    function user(){
        return $this->belongsTo(User::class,'author_id','id');
    }
}
