<?php

namespace App\Http\Controllers;

use App\Http\Resources\userressource;
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
            $this->$option();
        }else{
            return abort(404);
        }
    }

    function getlist(Request $request){
        return userressource::collection(User::all());
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
}
