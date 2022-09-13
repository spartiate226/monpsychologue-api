<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded=[];
    function psychologue(){
       return $this->hasOne(psychologue::class);
    }
    function visiteur(){
        return $this->hasOne(visiteur::class);
    }
    function etablissement(){
        return $this->hasOne(etablisement::class,'admin_id','id');
    }
    function cabinet(){
        return $this->hasOne(cabinet::class,'admin_id','id');
    }
    function forum(){
        return $this->hasOne(forum::class,'admin_id','id');
    }
    function role(){
        return $this->belongsTo(role::class);
    }
    function souscriptions(){
        return $this->hasMany(abonnement_soucription::class);
    }
    function psyrdvs(){
        return $this->hasMany(rdv::class,'psychologue_id','id');
    }
    function rdvs(){
        return $this->hasMany(rdv::class,'patient_id','id');
    }
}
