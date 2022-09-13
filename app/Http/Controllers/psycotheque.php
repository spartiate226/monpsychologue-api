<?php

namespace App\Http\Controllers;

use App\Models\categorielivre;
use App\Models\livre;
use Illuminate\Http\Request;

class psycotheque extends Controller
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
        if(isset($request->categorie) && $request->categorie!='all'){
            return livre::where('categorie_id','=',$request->categorie)->get();
        }
      return livre::all();
    }
    function getlivre($request){
        return livre::find($request->id);
    }
    function getcategories($request){
        return categorielivre::all();
    }
    
}
