<?php

namespace App\Http\Controllers;

use App\Models\cabinet;
use App\Models\etablisement;
use App\Models\psychologue;
use App\Models\visiteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return $this->$option($request);
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
    function register($request){
        $data=$request->all();
        switch ($request->type){
            case 'psychologue' :
                return $data;
                $user=User::create([
                    'role_id'=>2,
                    'email'=>$data['psychologue-email'],
                    'password'=>Hash::make($data['psychologue-password']),
                    'pseudonyme'=>$data['psychologue-pseudonyme']
                ]);
                $psychologue=psychologue::create([
                    'user_id'=>$user->id,
                    'nom'=>$data['psychologue-nom'],
                    'prenom'=>$data['psychologue-prenom'],
                    'photo'=>$data['psychologue-photo'],
                    'telephone'=>$data['psychologue-telephone'],
                    'description'=>$data['psychologue-description']
                ]);
                return Response()->json(['user'=>$user,'psychologue'=>$psychologue]);
                break;
            case 'visiteur' :
                $user=User::create([
                    'role_id'=>1,
                    'email'=>$data['visiteur-email'],
                    'password'=>Hash::make($data['visiteur-password']),
                    'pseudonyme'=>$data['visiteur-pseudonyme']
                ]);
                $visiteur=visiteur::create([
                    'user_id'=>$user->id,
                    'nom'=>$data['visiteur-nom'],
                    'prenom'=>$data['visiteur-prenom'],
                    'photo'=>$data['visiteur-photo'],
                    'telephone'=>$data['visiteur-telephone']
                ]);
                return Response()->json(['user'=>$user,'visiteur'=>$visiteur]);
                break;
            case 'cabinet' :
                $user=User::create([
                    'role_id'=>2,
                    'email'=>$data['psychologue-email'],
                    'password'=>Hash::make($data['psychologue-password']),
                    'pseudonyme'=>$data['psychologue-pseudonyme']
                ]);
                $psychologue=psychologue::create([
                    'user_id'=>$user->id,
                    'nom'=>$data['psychologue-nom'],
                    'prenom'=>$data['psychologue-prenom'],
                    'photo'=>$data['psychologue-photo'],
                    'telephone'=>$data['psychologue-telephone'],
                    'description'=>$data['psychologue-description'],
                    'verified'=>0
                ]);
                $datacab=[
                    'admin_id'=>$user->id,
                    'nom'=>$data['cabinet-nom'],
                    'email'=>$data['cabinet-email'],
                    'numero'=>$data['cabinet-numero'],
                    'photo'=>$data['cabinet-photo'],
                    'verified'=>0
                ];
                $cabinet=cabinet::create($datacab);
                return Response()->json(['user'=>$user,'admin'=>$psychologue,'cabinet'=>$cabinet,'code'=>200]);
                break;
            case 'etablissement' :
                $user=User::create([
                    'role_id'=>1,
                    'email'=>$data['visiteur-email'],
                    'password'=>Hash::make($data['visiteur-password']),
                    'pseudonyme'=>$data['visiteur-pseudonyme']
                ]);
                $visiteur=visiteur::create([
                    'user_id'=>$user->id,
                    'nom'=>$data['visiteur-nom'],
                    'prenom'=>$data['visiteur-prenom'],
                    'photo'=>$data['visiteur-photo'],
                    'telephone'=>$data['visiteur-telephone']
                ]);
                $dataet=[
                    'admin_id'=>$user->id,
                    'nom'=>$data['etablissement-nom'],
                    'email'=>$data['etablissement-email'],
                    'numero'=>$data['etablissement-numero'],
                    'photo'=>$data['etablissement-photo'],
                    'verified'=>0
                ];
                $etablissement=etablisement::create($dataet);
                return Response()->json(['user'=>$user,'admin'=>$visiteur,'etablissement'=>$etablissement,'code'=>200]);
                break;
        }
    }

}
