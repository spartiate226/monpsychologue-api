<?php

namespace App\Http\Controllers;

use App\Models\specialite;
use App\Http\Requests\StorespecialiteRequest;
use App\Http\Requests\UpdatespecialiteRequest;

class SpecialiteController extends Controller
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
     * @param  \App\Http\Requests\StorespecialiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorespecialiteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function show(specialite $specialite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function edit(specialite $specialite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatespecialiteRequest  $request
     * @param  \App\Models\specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatespecialiteRequest $request, specialite $specialite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialite $specialite)
    {
        //
    }
}
