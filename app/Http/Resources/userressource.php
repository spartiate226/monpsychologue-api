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
        return [
            'user'=>$this,
            'relations'=>[
                'visiteur'=>$this->visiteur,
                'psychologue'=>$this->psychologue,
                'cabinet'=>$this->cabinet,
                'etablissement'=>$this->etablissement,
            ]
        ];
    }
}
