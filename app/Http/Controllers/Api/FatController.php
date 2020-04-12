<?php

namespace App\Http\Controllers\Api;

use App\Fat;
use App\FatType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fats = Fat::all();
        return $fats;
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
        $type = FatType::firstOrCreate($request->input('type'));

        $fat = Fat::create([
          'name' => $request->input('name'),
          'type' => $type->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fat  $fat
     * @return \Illuminate\Http\Response
     */
    public function show(Fat $fat)
    {
        return $fat;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fat  $fat
     * @return \Illuminate\Http\Response
     */
    public function edit(Fat $fat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fat  $fat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fat $fat)
    {
        $fat->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fat  $fat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fat $fat)
    {
        $fat->delete();
    }
}
