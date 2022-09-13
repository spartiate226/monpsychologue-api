<?php

namespace App\Http\Controllers;

use App\Mail\abonnementmail;
use App\Models\abonnement_soucription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class abonnement extends Controller
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
        return \App\Models\abonnement::all();
    }
    function subscribe($request){
        $user=User::find($request->user_id);
        $data=$request->except(['dure']);
        $date = date_create(date('Y-m-d'));
        date_add($date, date_interval_create_from_date_string($request->dure.' days'));
        $data['expiration']=date_format($date,'Y-m-d');
        $data['code']=Str::random(5);
        if($request->abonnement_id==1){
            $subscribe=abonnement_soucription::create($data);
            Mail::to($user->email)->send(new abonnementmail($subscribe->code,'Evaluation'));
            return Response()->json(['rep'=>'ok','souscription'=>$subscribe]);
        }else{

        }
    }

    function getabonnementinfo($request){
        $souscription=abonnement_soucription::find($request->id);
        return Response()->json(['info'=>[
            'abonnement'=>$souscription->abonnement
        ]]);
    }
}
