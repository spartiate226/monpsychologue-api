<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class answerresource extends JsonResource
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
            'auteur'=>$this->user->pseudonyme,
            'question_id'=>$this->question_id,
            'reponse'=>$this->reponse,
            'date'=>$this->created_at
        ];
    }
}
