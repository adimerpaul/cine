<?php

namespace App\Http\Controllers;

use App\Models\Butaca;
use App\Http\Requests\StoreButacaRequest;
use App\Http\Requests\UpdateButacaRequest;

class ButacaController extends Controller
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
     * @param  \App\Http\Requests\StoreButacaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreButacaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Butaca  $butaca
     * @return \Illuminate\Http\Response
     */
    public function show(Butaca $butaca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Butaca  $butaca
     * @return \Illuminate\Http\Response
     */
    public function edit(Butaca $butaca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateButacaRequest  $request
     * @param  \App\Models\Butaca  $butaca
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateButacaRequest $request, Butaca $butaca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Butaca  $butaca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Butaca $butaca)
    {
        //
    }
}
