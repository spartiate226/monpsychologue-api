<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cabinet extends Model
{
    use HasFactory;
   function admin(){
        return $this->belongsTo(User::class,'admin_id','id');
   }
   function psychologues(){
       return $this->hasMany(psychologue::class);
   }
}
