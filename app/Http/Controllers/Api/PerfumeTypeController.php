<?php

namespace App\Http\Controllers\Api;

use App\PerfumeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfumeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = PerfumeType::all();
        return $types;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = PerfumeType($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PerfumeType  $perfumeType
     * @return \Illuminate\Http\Response
     */
    public function show(PerfumeType $perfumeType)
    {
        return $perfumeType;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PerfumeType  $perfumeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerfumeType $perfumeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PerfumeType  $perfumeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerfumeType $perfumeType)
    {
        $perfumeType->delete();
    }
}
