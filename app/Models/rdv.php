<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rdv extends Model
{
    use HasFactory;
    protected $guarded=[];
    function patient(){
        return $this->BelongsTo(User::class,'patient_id','id');
    }
    function psy(){
        return $this->BelongsTo(User::class,'psychologue_id','id');
    }
}
