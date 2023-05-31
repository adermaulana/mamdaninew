<?php

namespace App\Http\Controllers;

use App\Models\TesMinat;
use Illuminate\Http\Request;

class TesMinatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tesminat.index',[
            'title' => 'Hasil Tes Minat',
            'minat' => TesMinat::all()
        ]);
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
     * @param  \App\Http\Requests\StoreTesMinatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TesMinat  $tesMinat
     * @return \Illuminate\Http\Response
     */
    public function show(TesMinat $tesMinat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TesMinat  $tesMinat
     * @return \Illuminate\Http\Response
     */
    public function edit(TesMinat $tesMinat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTesMinatRequest  $request
     * @param  \App\Models\TesMinat  $tesMinat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TesMinat $tesMinat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TesMinat  $tesMinat
     * @return \Illuminate\Http\Response
     */
    public function destroy(TesMinat $tesMinat)
    {
        //
    }
}
