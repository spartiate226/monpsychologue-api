<?php

namespace App\Http\Controllers;

use App\Models\abonnement;
use App\Http\Requests\StoreabonnementRequest;
use App\Http\Requests\UpdateabonnementRequest;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreabonnementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreabonnementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function show(abonnement $abonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function edit(abonnement $abonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateabonnementRequest  $request
     * @param  \App\Models\abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateabonnementRequest $request, abonnement $abonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(abonnement $abonnement)
    {
        //
    }
}
