<?php

namespace App\Http\Controllers\Api;

use App\Lye;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LyeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lyes = Lye::all();
        return $lyes;
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
        $lye = Lye::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lye  $lye
     * @return \Illuminate\Http\Response
     */
    public function show(Lye $lye)
    {
        return $lye;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lye  $lye
     * @return \Illuminate\Http\Response
     */
    public function edit(Lye $lye)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lye  $lye
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lye $lye)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lye  $lye
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lye $lye)
    {
        $lye->delete();
    }
}
