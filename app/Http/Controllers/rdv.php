<?php

namespace App\Http\Controllers;

use App\Http\Resources\rdvresource;
use App\Mail\alerturgencemail;
use App\Mail\rdvmail;
use App\Models\abonnement_soucription;
use App\Models\psychologue;
use App\Models\urgence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class rdv extends Controller
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
    function take_rdv(Request $request){
        $data=$request->all();
        $code=Str::random(5);
        $data['code']=$code;
        $data['statut']='en attente';
        $rdv=\App\Models\rdv::create($data);
        Mail::to($rdv->patient->email)->send(new rdvmail($code,['statut'=>$data['statut'],'id'=>$rdv->id,'psychologue'=>$rdv->psy->nom.' '.$rdv->psy->prenom]));
        return Response()->json(['rep'=>'ok','rdv'=>$rdv]);
    }
    function single(Request $request){
       return \App\Models\rdv::find($request->id);
    }
    function list_rdv(Request $request){
        return rdvresource::collection(\App\Models\rdv::all());
    }

    function acceptordecline(Request $request){
        $rdv=\App\Models\rdv::find($request->id);
        $patient=$rdv->patient;
        if($request->decision==1){
            $decision='accepte';
        }else if($request->decision==0){
            $decision='refuse';
        }
        $rdv->update([
            'statut'=>$decision
        ]);
        Mail::to($patient->email)->send(new rdvmail($rdv->code,['statut'=>$decision,'id'=>$rdv->id,'psychologue'=>$rdv->psy->psychologue->nom.' '.$rdv->psy->psychologue->prenom,'justification'=>'']));
        return Response()->json(['rep'=>'ok']);
    }
    function urgence(Request $request){
     if(isset($request->code)){
         $abonnement=abonnement_soucription::where('code','=',$request->code)->where('expiration','>=',date('Y-m-d'))->get();
         if(count($abonnement)==0){
            return Response()->json(['message'=>"Vous n'avez pas d'abonnement valide"]);
         }else{
             if($abonnement[0]->abonnement->dure>count($abonnement[0]->user->rdvs)){
                $psychologuesmaison=psychologue::where('psymaison','=',1)->get();
                $data=$request->except(['code']);
                $code=Str::random(5);
                $data['code']=$code;
                $data['statut']='accepte';
                $rdv=urgence::create($data);
                foreach($psychologuesmaison as $psy){
                    Mail::to($psy->user->email)->send(new alerturgencemail($code,['patient'=>$request->nom,'id'=>$rdv->id]));
                }
                Mail::to($abonnement[0]->user->email)->send(new rdvmail($code,['statut'=>'accepte','id'=>$abonnement[0]->user->id,'psychologue'=>'Notre psychologue']));
                return Response()->json(['message'=>'Demande accepter avec succes, verifier votre mail pour plus de detail']);
             }else{
                return Response()->json(['message'=>'Vous aviez atteint le nombre de consultation disponible']);
             }
         }
     }else{
        return Response()->json(['message'=>'Code abonnement inconnue']);
     }

    }
}
