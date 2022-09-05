<?php

namespace App\Http\Controllers;

use App\Models\livre;
use App\Models\forum;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$page)
    {
        if(method_exists($this,$page)){
            return $this->$page($request);
        }else{
            return abort(404);
        }
    }

    function  home($request){
        return view('home');
    }
    function  utilisateurs($request){
        return view('utilisateur');
    }
    function  roles($request){
        return view('role');
    }
    function  permissions($request){
        return view('permission');
    }

    function  livres($request){
        $livres=livre::paginate(20);
        return view('livre',compact('livres'));
    }
    function  forums($request){
        $forums=forum::paginate(20);
        return view('groupe',compact('forums'));
    }

    function addbook($request){
        $data=$request->except(['livre','photo']);
        if(isset($request->candownload)){
            $data['candownload']=true;
        }else{
            $data['candownload']=false;
        }
        $data['lien']=$request->livre->store('psychotech','public');
        $data['photo']=$request->photo->store('photolivres','public');
        livre::create($data);
        return redirect('dashboard/livres');
    }


    function addforum($request){
        forum::create($request->all());
        return redirect('dashboard/forums');
    }

}
