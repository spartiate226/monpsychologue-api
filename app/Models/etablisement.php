<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etablisement extends Model
{
    use HasFactory;
    protected $guarded=[];
    function admin(){
        return $this->belongsTo(User::class,'admin_id','id');
    }
    function visiteurs(){
        return $this->hasMany(visiteur::class);
    }
}
