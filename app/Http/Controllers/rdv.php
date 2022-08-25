<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            $this->$option();
        }else{
            return abort(404);
        }
    }
    function take_rdv(Request $request){
        $data=$request->all();
        $code=Str::random(8);
        $data['code']=Hash::make($code);
        $rdv=\App\Models\rdv::create($data);
        return $rdv;
    }
    function single(Request $request){
       return \App\Models\rdv::find($request->id);
    }
    function list_rdv(Request $request){
        return \App\Models\rdv::all();
    }
}
