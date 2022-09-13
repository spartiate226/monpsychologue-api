<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class abonnement_soucription extends Model
{
    use HasFactory;
    protected $guarded=[];
    function abonnement(){
        return $this->BelongsTo(abonnement::class);
    }
}
