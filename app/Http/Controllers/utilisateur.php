<?php

namespace App\Http\Controllers;

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
}
