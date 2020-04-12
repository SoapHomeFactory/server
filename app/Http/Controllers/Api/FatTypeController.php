<?php

namespace App\Http\Controllers\Api;

use App\FatType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FatTypeController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $types = FatType::all();
        return $types;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FatType  $fatType
     * @return \Illuminate\Http\Response
     */
    public function show(FatType $fatType)
    {
        return $fatType;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FatType  $fatType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FatType $fatType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FatType  $fatType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FatType $fatType)
    {
        $fatType->delete();
    }
}
