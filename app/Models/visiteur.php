<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visiteur extends Model
{
    use HasFactory;
    protected $guarded=[];
    function etablissement(){
        return $this->belongsTo(etablisement::class);
    }
}
