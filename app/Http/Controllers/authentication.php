<?php

namespace App\Http\Controllers;

use App\Models\cabinet;
use App\Models\etablisement;
use App\Models\psychologue;
use App\Models\visiteur;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authentication extends Controller
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
            $this->$option($request);
        }else{
            return abort(404);
        }
    }
    function login(Request $request){
        if(Auth::attempt($request->all())){
            $user=Auth::user();
            switch ($user->role->label){
                case 'psychologue' :
                    $sup=$user->psychologue;
                    break;
                case 'visiteur' :
                    $sup=$user->visiteur;
                    break;
            }
            return  Response()->json(['user'=>$user,'moreinfo'=>$sup]);
        }else{
            return 'unknown';
        }
    }
    function register(Request $request){
       return  json_encode($request->all());
        switch ($request->type){
            case 'psychologue' :
                $user=User::create($request->user);
                $psychologue=psychologue::create($request->psychologue);
                return Response()->json(['user'=>$user,'psychologue'=>$psychologue]);
                break;
            case 'visiteur' :
                $user=User::create($request->user);
                $visiteur=visiteur::create($request->visiteur);
                return Response()->json(['user'=>$user,'psychologue'=>$visiteur]);
                break;
            case 'cabinet' :
                $data=$request->cabinet;
                $user=User::create($request->user);
                $psychologue=psychologue::create($request->psychologue);
                $data['admin_id']=$user->id;
                $cabinet=cabinet::create($data);
                return Response()->json(['user'=>$user,'psychologue'=>$psychologue,'cabinet'=>$cabinet]);
                break;
            case 'etablissement' :
                $data=$request->etablissement;
                $user=User::create($request->user);
                $visiteur=visiteur::create($request->visiteur);
                $data['admin_id']=$user->id;
                $etablissement=etablisement::create($data);
                return Response()->json(['user'=>$user,'psychologue'=>$visiteur,'cabinet'=>$etablissement]);
                break;
        }
    }

}
