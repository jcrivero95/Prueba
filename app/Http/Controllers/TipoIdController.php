<?php

namespace App\Http\Controllers;

use App\TipoId;
use Illuminate\Http\Request;

class TipoIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs = TipoId::query()->get();
        return response()->json([
            'data' => $rs
        ], 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoId  $tipoId
     * @return \Illuminate\Http\Response
     */
    public function show(TipoId $tipoId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoId  $tipoId
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoId $tipoId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoId  $tipoId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoId $tipoId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoId  $tipoId
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoId $tipoId)
    {
        //
    }
}
