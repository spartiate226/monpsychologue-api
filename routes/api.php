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
    Route::any('auth/{option}','authentication')->middleware('cors');
    Route::any('utilisateur/{option}','utilisateur')->middleware('cors');
    Route::any('rdv/{option}','rdv')->middleware('cors');
    Route::any('psychotheque/{option}','psycotheque')->middleware('cors');
    Route::any('forum/{option}','forum')->middleware('cors');
    Route::any('abonnement/{option}','abonnement')->middleware('cors');
});
