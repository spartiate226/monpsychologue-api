<?php

namespace App\Http\Controllers;

use App\Http\Resources\psychologueressource;
use App\Http\Resources\userressource;
use App\Models\psychologue;
use App\Models\specialite;
use App\Models\User;
use Illuminate\Http\Request;

class utilisateur extends Controller
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

    function getlist(Request $request){
        switch ($request->type) {
            case 'psychologues':
                return psychologue::all();
                break;
            case 'visiteur':
                    # code...
                break;
            case 'cabinet':
                        # code...
                break;
            case 'etablissement':
                            # code...
                break;

            default:
            return userressource::collection(User::all());
                break;
        }
    }
    function del(Request $request){
        return User::find($request->id)->delete();
    }
    function update(Request $request){
        $user=User::find($request->id);
        $user->update($request->all());
        return $user;
    }
    function getuser(Request $request){
       return new userressource(User::find($request->id));
    }
    function psychologues(Request $request){
        return psychologue::all();
    }
    function getspecialites(){
        return specialite::all();
    }
}
