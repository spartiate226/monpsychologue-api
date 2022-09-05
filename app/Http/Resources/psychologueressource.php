<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class psychologueressource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id'=>$this->user_id,
            'photo'=>$this->photo,
            'description'=>$this->description,
            'nom'=>$this->nom,
            'prenom'=>$this->prenom,
            'telephone'=>$this->telephone,
            'verified'=>$this->verified,
            'user'=>$this->user,
            'rdv'=>$this->rdvs,
            'cabinet'=>$this->cabinet,
        ];
    }
}
