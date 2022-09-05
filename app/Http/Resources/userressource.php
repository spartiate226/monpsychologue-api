<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userressource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $utilisateur=$this;
        return [
            'pseudonyme'=>$this->pseudonyme,
            'email'=>$this->email,
            'role_id'=>$this->role_id,
            'relations'=>[
                'visiteur'=>new visiteurressource($this->visiteur),
                'psychologue'=>new psychologueressource($this->psychologue),
                'cabinet'=>$this->cabinet,
                'etablissement'=>$this->etablissement,
            ]
        ];
    }
}
