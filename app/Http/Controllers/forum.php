<?php

namespace App\Http\Controllers;

use App\Http\Resources\answerresource;
use App\Models\forum_question;
use App\Models\forum_question_reponse;
use Illuminate\Http\Request;

class forum extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$option)
    {
        if(method_exists($this,$option)){
            return $this->$option($request);
        }else{
            return abort(404);
        }
    }

    function getlist($request){
        return \App\Models\forum::all();
    }
    function getquestions($request){
        return \App\Models\forum::find($request->id)->questions;
    }

    function getanswers($request){
        return answerresource::collection(forum_question::find($request->questionid)->reponses);
    }
    function addquestion($request){
        forum_question::create($request->all());
        return Response()->json(['response'=>'ok']);
    }
    function addanswer($request){
       forum_question_reponse::create($request->all());
        return Response()->json(['response'=>'ok']);
    }
}
