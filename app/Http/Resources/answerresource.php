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
            'id'=>$this->id,
            'auteur'=>$this->user->pseudonyme,
            'question_id'=>$this->question_id,
            'reponse'=>$this->reponse,
            'reponseto'=>new answerresource($this->reponseto),
            'date'=>$this->created_at
        ];
    }
}
