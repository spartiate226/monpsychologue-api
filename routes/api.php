<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('App\Http\Controllers')->group(function (){
    Route::any('auth/{option}','authentication');
    Route::any('utilisateur/{option}','utilisateur');
    Route::any('rdv/{option}','rdv');
    Route::any('psychotheque/{option}','psycotheque');
    Route::any('forum/{option}','forum');
});
